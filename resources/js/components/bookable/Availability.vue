<template>
  <div>
      <h6 class="text-uppercase font-weight-bolder text-secondary"> Check Availability
        <span v-if="noAvailability" class="text-danger" >(NOT AVAILABLE)</span>
        <span v-if="hasAvailability" class="text-success" >(AVAILABLE)</span>
      </h6>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="form">Form</label>
            <input
                type="text"
                name="form"
                id="form"
                class="form-control form-control-sm"
                placeholder="Start Date"
                v-model="from"
                :class="[{'is-invalid' : this.errorFor('from')}]"
            />
        <div class="invalid-feedback" v-for="(err,index) in this.errorFor('from')" :key="'from' + index" ><li>{{err}}</li></div>
        </div>
        <div class="form-group col-md-6">
            <label for="to">To</label>
            <input
                type="text"
                name="to"
                id="to"
                class="form-control form-control-sm"
                placeholder="End Date"
                v-model="to"
                :class="[{'is-invalid' : this.errorFor('to')}]"
            >
        <div class="invalid-feedback" v-for="(err,index) in this.errorFor('to')" :key="'to' + index" ><li>{{err}}</li></div>
        </div>
    </div>
        <button @click="check" class="btn btn-secondary btn-block">Check!</button>
  </div>
</template>

<script>
export default {
    props : {
        bookableId : String
    },
    data : () => {
        return {
            from : null,
            to : null,
            loading : false,
            status : null,
            errors : null,
        }
    },
    methods : {
        check(){
            this.loading = true;
            this.errors = null;
            axios.get(`/api/bookables/${this.bookableId}/availability?from=${this.from}&to=${this.to}`)
            .then((res)=>{
                this.status = res.status;
            })
            .catch((err)=>{
                if(422 == err.response.status)
                {
                    this.errors = err.response.data.errors;
                }
                this.status = err.response.status;
            }).then(() => {this.loading = false;});
        },

        errorFor(field){
            return this.hasErrors && this.errors[field] ? this.errors[field] : null;
        }
    },

    computed: {
        hasErrors(){
            return 422 == this.status && this.errors != null;
        },
        hasAvailability(){
            return 200 == this.status;
        },
        noAvailability(){
            return 404 == this.status;
        }
    },
}
</script>

<style scoped>
    label {
        font-size: 0.7 rem;
        text-transform: uppercase;
        color: grey;
        font-weight: bolder;
    }
</style>

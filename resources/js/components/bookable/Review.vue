<template>
  <div>
      <h5 class="text-uppercase text-secondary font-weight-bolder " >Review List</h5>
        <div v-if="loading">
            <h5> Loading.....</h5>
        </div>
        <div v-else>
      <div class="border-bottom d-none d-md-block " v-for="(review,index) in reviews" :key="index" >
          <div class="row pt-4">
              <div class="col-sm-6">Naveen Kumar</div>
              <div class="col-sm-6 d-flex justify-content-end">
                  <!-- {{review.rating}} -->
                <star-rating :rating = "review.rating"></star-rating>  
                </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  {{review.created_at | fromNow}}
              </div>
          </div>
          <div class="row pt-4">
              <div class="col-sm-12">
                    {{review.content}}
              </div>
          </div>
      </div>
      </div>
  </div>
</template>

<script>
export default {
     props : {
        bookableId : String
    },
    data : () => {
        return {
            loading : false,
            reviews : null
        }
    },

    created() {
       this.loading = true;
       axios.get(`/api/bookables/${this.bookableId}/reviews`)
       .then(res => this.reviews = res.data.data)
       .then(this.loading = false);
    },
}
</script>

<style>

</style>

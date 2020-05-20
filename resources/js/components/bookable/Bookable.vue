<template>
  <div class="container">
    <div class="row">
        <div class="col-md-8">
          <bookable-item v-bind="bookable" class="mb-4" ></bookable-item>

          <app-review :bookable-id="this.$route.params.id" ></app-review>

        </div>
        <div class="col-md-4">
            <availability :bookable-id="this.$route.params.id" ></availability>
        </div>
    </div>
  </div>
</template>

<script>
import BookableItem from '../BookableItem'
import availability from '../bookable/Availability'
import AppReview from '../bookable/Review'

export default {
    data : () =>  {
        return {
            bookable : {}
        }
    },
    components :{
        BookableItem, availability,AppReview
    },
    created(){
        axios.get('/api/bookable/'+this.$route.params.id)
        .then(res => {
            this.bookable = res.data.data
        })
        .catch(err => {
            console.error(err);
        })
    }
}
</script>

<style>

</style>

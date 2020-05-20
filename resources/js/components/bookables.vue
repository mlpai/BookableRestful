<template>
    <div class="container">
        <div v-if="loading" >
            <h3>  Loading........ </h3>
            </div>
        <div v-else
            class="row mb-4"
            v-for="(row,index) in rows"
            :key="'row' + row + index">
            <div
                class="col d-flex align-items-stretch"
                v-for="(bookable,column) in bookableInRow(row)"
                :key="'row' + row + column "
            >
                <bookable-item v-bind="bookable"></bookable-item>
            </div>

            <div class="col" v-for="placeholder in palceholderInRow(row)" :key="'row'+row+placeholder" ></div>
        </div>
    </div>
</template>

<script>
import BookableItem from '../components/BookableItem';

    export default {
        data : ()=>{
            return {
                loading : true,
                column : 3,
                bookables : []
            }
        },
        computed: {
            rows(){
                return this.bookables.length == null ? 0 : Math.ceil(this.bookables.length / this.column)
            }
        },
        methods : {
            bookableInRow(row)
            {
                return this.bookables.slice((row - 1) * this.column, row * this.column);
            },
            palceholderInRow(row)
            {
                return this.column - this.bookableInRow(row).length;
            }
        },
        mounted() {
            console.log('Component mounted.');

                axios.get('/api/bookable')
                .then(res => {
                    console.log(res)
                    this.bookables = res.data.data
                    this.loading = false
                })
                .catch(err => {
                    console.error(err);
                })

        },
    components : {
        BookableItem
    },
}
</script>

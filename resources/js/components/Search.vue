<template>
     <div class="col-lg-6 col-6 text-left search-position" style="position: relative;">
            <form action="">
                <div class="input-group">
                    <input type="search" v-model="search" class="form-control" name="search" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
                <table class="table table-bordered table-position" v-show="isOpen" style="position: absolute;">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                    <tr v-for="item in items" :key="item.id">
                        <td>
                            <img :src="'product/img/' + item.image" alt="" height="50" width="50">
                        </td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.price }}</td>
                    </tr>
                </table>
            </form>
        </div>
</template>

<script>
    export default {
        name: "Search",
        data() {
            return {
                search : '',
                items  : [],
                isOpen : false
            }
        },

        watch: {
            search(after, before) {
                axios.get('/get/search/products/', { params : {search : this.search } })
                .then(response => {
                    if(this.search.length > 0){
                        this.isOpen = true
                        this.items = response.data
                    } else {
                        this.isOpen = false
                    }
                }).catch(error => {
                    console.log(error)
                })
            }
        },

        mounted() {

        },

        created() {

        },

        methods: {

        }


    }
</script>

<style>
    .search-position {
        position: relative;
    }

    .table-position {
        width: 37.3rem;
        position: absolute;
        background: rgba(255, 255, 255, 0.952);
        z-index: 9;
    }


</style>
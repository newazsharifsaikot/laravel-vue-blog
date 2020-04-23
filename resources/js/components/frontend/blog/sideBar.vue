<template>
    <div class="blogSidebar">
        <div class="span4">
            <aside class="right-sidebar">
                <div class="widget">
                    <form class="form-search">
                        <input placeholder="Type something" @keypress="search" v-model="searchdata" type="text" class="input-medium search-query">
                        <button type="submit" @click.prevent="search" class="btn btn-square btn-theme">Search</button>
                    </form>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Categories</h5>
                    <ul class="cat">
                        <li v-for="category in getAllCAtegories"><i class="icon-angle-right"></i><router-link :to="`/category/post/${category.id}`">{{category.name}}</router-link><span>(10)</span></li>
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Latest posts</h5>
                    <ul class="recent">
                        <li v-for="(post,index) in getLatestPost" v-if="index >= 5">
                            <img :src="`uploads/post/${post.image}`" class="pull-left" alt="" width="80" height="150"/>
                            <h6><router-link :to="`/blog/${post.id}`">{{post.title|truncate(20) }}</router-link></h6>
                            <p>
                                {{post.description | truncate(40)}}
                            </p>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash'
    export default {
        name: "sideBar",
        data(){
            return{
                searchdata:''
            }
        },

        mounted(){
            this.$store.dispatch('getAllCategory')
            this.$store.dispatch('getLatestPost')
        },
        computed:{
            getAllCAtegories(){
                return this.$store.getters.getAllCategories
            },
            getLatestPost(){
                return this.$store.getters.getLatestPost
            }
        },
        methods:{
            search:_.debounce( function() {
                this.$store.dispatch('searchPost',this.searchdata)
            },1000)
        },

    }
</script>

<style scoped>

</style>
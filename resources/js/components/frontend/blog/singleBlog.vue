<template>
    <div id="singleBar">
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <div class="inner-heading">
                            <h2>Post Details</h2>
                        </div>
                    </div>
                    <div class="span8">
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                            <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                            <li class="active">Blog post right sidebar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <article>
                            <div class="row">
                                <div class="span8">
                                    <div class="post-image">
                                        <div class="post-heading">
                                            <h3><a href="#">{{getSinglePost.title}}</a></h3>
                                        </div>
                                        <img :src="`uploads/post/${getSinglePost.image}`" alt="" />
                                    </div>
                                    <p>
                                        {{getSinglePost.description}}
                                    </p>

                                    <div class="bottom-article">
                                        <ul class="meta-post">
                                            <li v-if="getSinglePost.user"><i class="icon-user"></i><a href="#"> {{getSinglePost.user.name}}</a></li>
                                            <li v-if="getSinglePost.category"><i class="icon-folder-open"></i><a href="#"> {{getSinglePost.category.name}}</a></li>
<!--                                            <li ><i class="icon-tags"></i><a href="#"></a></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!-- author info -->

                    </div>
                    <sideBar/>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import sideBar from './sideBar'
    export default {
        name: "singleBlog",

        components:{
            sideBar
        },

        mounted(){
            this.LatestPost()
        },

        computed:{
            getSinglePost(){
                return this.$store.getters.getSinglePost
            }
        },

        methods:{
            LatestPost(){
                this.$store.dispatch('getSinglePost',this.$route.params.id)
            }
        },
        watch: {
            $route(to, from) {
                this.LatestPost()
            }
        }

    }
</script>

<style scoped>

</style>
<template>
    <div id="blogPost">
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <div class="inner-heading">
                            <h2>Blog left sidebar</h2>
                        </div>
                    </div>
                    <div class="span8">
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                            <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                            <li class="active">Blog with left sidebar</li>
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
                            <div class="row" v-for="post in getBlogPost">
                                <div class="span8">
                                    <div class="post-image">
                                        <div class="post-heading">
                                            <h3><router-link :to="`/blog/${post.id}`">{{post.title}}</router-link></h3>
                                        </div>
                                        <img :src="`uploads/post/${post.image}`" alt="" />
                                    </div>
                                    <p>
                                        {{post.description}}
                                    </p>
                                    <div class="bottom-article">
                                        <ul class="meta-post">
                                            <li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
                                            <li v-if="post.category"><i class="icon-user"></i><a href="#"> {{post.category.name}}</a></li>
                                            <li v-if="post.user"><i class="icon-folder-open"></i><a href="#">{{post.user.name}}</a></li>
                                            <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                                        </ul>
                                        <router-link :to="`/blog/${post.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <div id="pagination">
                            <span class="all">Page 1 of 3</span>
                            <span class="current">1</span>
                            <a href="#" class="inactive">2</a>
                            <a href="#" class="inactive">3</a>
                        </div>
                    </div>
                    <blogSidebar/>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import blogSidebar from "./sideBar.vue"
    export default {
        name: "blogPost",
        components:{
            blogSidebar
        },

        mounted(){
            this.$store.dispatch('getBlogPost')
        },

        computed:{
            getBlogPost(){
                return this.$store.getters.getAllBlogPost
            }
        },
        methods:{
            CategoryPost(){
                if (this.$route.params.id){
                    this.$store.dispatch('getPostByCategory',this.$route.params.id)
                } else{
                    this.$store.dispatch('getBlogPost')
                }

            }
        },
        watch:{
            $route(to, from){

                this.CategoryPost()
            }
        }
    }
</script>

<style scoped>

</style>
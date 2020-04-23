<template>
    <div>
        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary">
                            <router-link to="/add-post" class="text-white">Add Post</router-link>
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-responsive table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="5%%">Serial No</th>
                                    <th width="10%">User Name</th>
                                    <th width="10%%">Category Name</th>
                                    <th width="20%%">Title</th>
                                    <th width="20%%">Description</th>
                                    <th width="15%%">Image</th>
                                    <th width="20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-if="allPost.length" v-for="(post, index) in allPost" :key="post.id">
                                    <td>{{index + 1}}</td>
                                    <td v-if="post.user">{{post.user.name}}</td>
                                    <td v-if="post.category">{{post.category.name}}</td>
                                    <td>{{post.title | truncate(20)}}</td>
<!--                                    <td>{{post.title.substring(0, 20)}}</td>-->
                                    <td>{{post.description| truncate(30)}}</td>
<!--                                    <td>{{post.description.slice(0, 33)}}</td>-->
                                    <td v-if="post.image">
<!--                                        <img :src="`uploads/post/${post.image}`" alt="img" width="120" height="60" class="img-fluid">-->
                                        <img :src="postImage(post.image)" alt="img" width="120px" height="90px" class="img-fluid">
                                    </td>
                                    <td>
                                        <router-link :to="`/post-details/${post.id}`" type="button" class="btn btn-primary btn-sm text-white">
                                            <i class="fas fa-eye"></i>
                                        </router-link>
                                        <router-link :to="`/edit-post/${post.id}`" type="button" class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </router-link>
                                        <button  @click="deletePost(post)" type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>

                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="5%%">Serial No</th>
                                    <th width="10%">User Name</th>
                                    <th width="10%%">Category Name</th>
                                    <th width="20%%">Title</th>
                                    <th width="20%%">Description</th>
                                    <th width="15%%">Image</th>
                                    <th width="20%">Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <vue-progress-bar></vue-progress-bar>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</template>

<script>
    export default {
        name: "postComponent",

        data(){
            return{

            }
        },

        mounted(){
            this.$store.dispatch('getPost')
        },

        computed:{
            allPost(){
               return this.$store.getters.getAllPost
            }
        },

        methods:{
            postImage(img){
                return "uploads/post/"+img
            },

            deletePost(post){
                Swal.fire({
                    title: 'Are you sure Delete This?',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    if (result.value) {
                        //Send Request to server
                        axios.delete('/post-delete/'+post.id)
                            .then((response)=> {
                                Swal.fire(
                                    'Deleted!',
                                    'Post deleted successfully',
                                    'success'
                                )
                                this.$store.dispatch('getPost')
                                toast.fire({
                                    icon:'success',
                                    type: 'success',
                                    title: 'Post Deleted Successfully'
                                })

                            }).catch(() => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                // footer: '<a href>Why do I have this issue?</a>'
                            })
                        })
                    }

                })

            }
        }
    }
</script>

<style scoped>

</style>
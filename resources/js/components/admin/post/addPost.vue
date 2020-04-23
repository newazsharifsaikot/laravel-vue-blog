<template>
    <div id="add_post">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!--                            <h1>General Form</h1>-->
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Post</h3>
                            </div>

                            <form role="form" @submit.prevent="addPost" @keydown="form.onKeydown($event)">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="categoryId">Category Name</label>
                                        <select v-model="form.category_id" name="category_id" class="form-control" :class="{ 'is-invalid': form.errors.has('category_id')}" id="categoryId">
                                            <option disabled value="">Select Category</option>
                                            <option v-for="category in allCategory" :value="category.id" :key="category.id">{{category.name}}</option>
                                        </select>
                                        <has-error :form="form" field="category_id"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="postTitle">Title</label>
                                        <input type="text" v-model="form.title" class="form-control" name="title" id="postTitle" :class="{ 'is-invalid': form.errors.has('title') }" placeholder="Enter Title">
                                        <has-error :form="form" field="title"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="postDescription">Description</label>
                                        <markdown-editor v-model="form.description" name="description" id="postDescription" :class="{ 'is-invalid': form.errors.has('description')}" placeholder="Enter Description"></markdown-editor>
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="postImage">Choose Image</label><br>
                                        <input type="file" name="image" :class="{ 'is-invalid': form.errors.has('image')}" id="postImage" @change="changeImage($event)">
                                        <has-error :form="form" field="image"></has-error>
                                    </div>
                                    <img :src="form.image" alt="img" width="120" height="90" v-if="form.image">
                                </div>

                                <div class="card-footer">
                                    <button :disabled="form.busy" type="submit" class="btn btn-primary">Submit</button>
                                    <router-link to="/post" type="button" class="btn btn-danger">Back</router-link>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <vue-progress-bar></vue-progress-bar>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "addPost",

        data(){
            return{
                form:new Form({
                    category_id:'',
                    title:'',
                    description:'',
                    image:'',
                })
            }
        },

        mounted() {
            this.$store.dispatch('getCategory')
        },

        computed:{
            allCategory(){
                return this.$store.getters.getAllCategory
            }
        },

        methods:{
            addPost(){
                this.$Progress.start()
                this.form.busy = true
                this.form.post('/post-store')
                    .then( response => {
                        this.$router.push('/post')
                        toast.fire({
                            icon:'success',
                            type: 'success',
                            title: 'Category Added Successfully'
                        })
                        this.$Progress.finish()

                    })
                    .catch( e => {
                        console.log(e)
                        this.$Progress.fail()
                    })
            },
            changeImage(event){
                let file = event.target.files[0];
                if (file.size > 1048576){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Image Size is too big',
                        // footer: '<a href>Why do I have this issue?</a>'
                    })
                } else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.image = event.target.result
                         // console.log(event.target.result)
                    };

                    reader.readAsDataURL(file);
                }

            }
        }
    }
</script>

<style scoped>

</style>
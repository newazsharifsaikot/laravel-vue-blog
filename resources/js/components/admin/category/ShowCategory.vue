<template>
    <div id="add_category">
        <!-- Content Wrapper. Contains page content -->
            <!-- Content Header (Page header) -->
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
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Category Details</h3>
                                </div>

                                <form role="form" @submit.prevent="updateCategory()" @keydown="form.onKeydown($event)">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="categoryName">Category Name</label>
                                            <input type="text" v-model="form.name" name="name" class="form-control" :class="{'is-invalid': form.errors.has('name')}"
                                                   id="categoryName" placeholder="Enter Name" readonly>
                                            <has-error :form="form" field="name"></has-error>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <router-link to="/category" type="button" class="btn btn-danger">Back</router-link>
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
        name: "AddCategory",

        data(){
            return{
                form: new Form({
                    id:'',
                    name:'',
                    slug:'',
                })
            }
        },

        mounted(){
            this.form.get(`category-details/${this.$route.params.id}`)
                .then( response =>{
                    // console.log(response.data)
                    this.form.fill(response.data)
                })
                .catch(e => {
                    console.log(e)
                })
        },

        computed:{

        },

        methods:{

        }

    }
</script>

<style scoped>

</style>
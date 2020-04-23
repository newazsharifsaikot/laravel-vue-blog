<template>
    <div>
        <!-- Content Wrapper. Contains page content -->

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary">
                                 <router-link to="/add-category" class="text-white">Add Category</router-link>
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
                                <h3 class="card-title">Category List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="10%">
                                            <select @change="deleteCategory" v-model="select">
                                                <option value="">Select</option>
                                                <option value="">Delete All</option>
                                            </select>
                                            <input type="checkbox" @click="selectAll" >
                                            <span v-if="select_all == false">Check All</span>
                                            <span v-else>Uncheck</span>
                                        </th>
                                        <th width="10%">Serial No</th>
                                        <th width="20%">Name</th>
                                        <th width="10%%">Slug</th>
                                        <th width="10%">Create Time</th>
                                        <th width="30%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-if="allCategory.length" v-for="(category, index) in allCategory" :key="category.id">
                                        <td width="10%">
                                            <input type="checkbox" v-model="selectedCategory" :value="category.id">
                                        </td>
                                        <td width="10%">{{index + 1}}</td>
                                        <td width="15%">{{category.name}}</td>
                                        <td width="15%">{{category.slug}}</td>
                                        <td width="20%">{{category.created_at | dateFormater}}</td>
                                        <td width="20%">
<!--                                            <button @click="showCat(category)" type="button" class="btn btn-primary btn-sm text-white">-->
<!--                                                <i class="fas fa-eye"></i>-->
<!--                                            </button>-->
                                            <router-link :to="`/category-details/${category.id}`" type="button" class="btn btn-primary btn-sm text-white">
                                                <i class="fas fa-eye"></i>
                                            </router-link>
<!--                                            <button @click="editCat(category)" type="button" class="btn btn-success btn-sm">-->
<!--                                                <i class="fas fa-edit"></i>-->
<!--                                            </button>-->
                                            <router-link :to="`/edit-category/${category.id}`" type="button" class="btn btn-success btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </router-link>
                                            <button @click="deleteCat(category)" type="button" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>

                                    </tr>

                                    </tbody>

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

        <!-- editModal -->
<!--        <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">-->
<!--            <div class="modal-dialog" role="document">-->
<!--                <div class="modal-content">-->
<!--                    <div class="modal-header">-->
<!--                        <h5 class="modal-title" id="editModalLongTitle">Edit Category</h5>-->
<!--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                            <span aria-hidden="true">&times;</span>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                    <form @submit.prevent="updateCat" @keydown="form.onKeydown($event)">-->
<!--                    <div class="modal-body">-->
<!--                        <div class="form-group">-->
<!--                            <label for="categoryName">Category Name</label>-->
<!--                            <input type="text" v-model="form.name" name="name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" id="categoryName" placeholder="Enter Name">-->
<!--                            <has-error :form="form" field="name"></has-error>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                        <button type="submit" class="btn btn-primary">Update</button>-->
<!--                    </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <!-- showModal -->
<!--        <div class="modal fade" id="showCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">-->
<!--            <div class="modal-dialog" role="document">-->
<!--                <div class="modal-content">-->
<!--                    <div class="modal-header">-->
<!--                        <h5 class="modal-title" id="showModalLongTitle">Edit Category</h5>-->
<!--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                            <span aria-hidden="true">&times;</span>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                    <div >-->
<!--                        <div class="modal-body">-->
<!--                            <div class="form-group">-->
<!--                                <label for="categoryName">Category Name</label>-->
<!--                                <input type="text" v-model="form.name" name="name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Enter Name" readonly>-->
<!--                                <has-error :form="form" field="name"></has-error>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="modal-footer">-->
<!--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

    </div>
</template>

<script>
    export default {
        name: "CategoryComponent",

        data(){
            return{
                form: new Form({
                    id:'',
                    name:'',
                    slug:'',
                }),
                categories:[],
                selectedCategory : [],
                select_all: false,
                select: '',
            }
        },
        mounted() {
            // this.allCategory()
            this.$store.dispatch('getCategory')
        },
        computed:{
            allCategory(){
               return this.$store.getters.getAllCategory
            }
        },
        methods:{
            deleteCategory(){
                axios.get('/delete-all-category/'+this.selectedCategory)
                    .then( response =>{
                        this.selectedCategory = []
                        this.$store.dispatch('getCategory')
                        toast.fire({
                            icon:'success',
                            type: 'success',
                            title: 'Category Deleted Successfully'
                        })
                    })
                    .catch( e =>{
                        console.log(e)
                    })
            },

            selectAll(){
                if (this.select_all == false){
                    this.select_all = true
                    for( let category in this.allCategory){
                        this.selectedCategory.push(this.allCategory[category].id)

                    }
                } else{
                    this.select_all = false
                    this.selectedCategory = []
                }

            },

            // allCategory(){
            //     this.$Progress.start()
            //     axios.get('/category')
            //         .then(response => {
            //             console.log(response)
            //             this.categories = response.data.data
            //             this.$Progress.finish()
            //         })
            //         .catch(e =>{
            //             console.log(e)
            //             this.$Progress.fail()
            //         })
            // },
            //
            deleteCat(category){
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
                        this.form.delete('/delete-cat/'+category.id)
                            .then((response)=> {
                                Swal.fire(
                                    'Deleted!',
                                    'User deleted successfully',
                                    'success'
                                )
                                this.$store.dispatch('getCategory')
                                toast.fire({
                                    icon:'success',
                                    type: 'success',
                                    title: 'Category Deleted Successfully'
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

                // this.$Progress.start();
                // axios.delete('/delete-cat/'+category.id)
                //     .then( response => {
                //         this.allCategory()
                //         toast.fire({
                //             icon:'success',
                //             type: 'success',
                //             title: 'Category Deleted Successfully'
                //         })
                //         this.$Progress.finish();
                //     })
                //     .catch(e =>{
                //         console.log(e)
                //         toast.fire({
                //             icon:'error',
                //             type: 'error',
                //             title: 'Something Went Wrong'
                //         })
                //         this.$Progress.fail();
                //     })
            },

            // editCat(category){
            //     this.form.clear()
            //     this.form.reset()
            //     this.form.fill(category)
            //     $('#editCategoryModal').modal('show')
            // },
            //
            // updateCat(){
            //     this.$Progress.start()
            //     this.form.busy = true
            //     this.form.put('/category-update/'+this.form.id)
            //         .then(response => {
            //             this.$store.dispatch('getCategory')
            //             $('#editCategoryModal').modal('hide')
            //             this.$Progress.finish()
            //             toast.fire({
            //                 icon:'success',
            //                 type: 'success',
            //                 title: 'Category Updated Successfully'
            //             })
            //         })
            //         .catch(e =>{
            //             console.log(e)
            //             this.$Progress.fail()
            //             toast.fire({
            //                 icon:'error',
            //                 type: 'error',
            //                 title: 'Something Went Wrong'
            //             })
            //
            //         })
            // },

            // showCat(category){
            //     this.form.fill(category)
            //     $('#showCategoryModal').modal('show')
            // }
        },

    }
</script>

<style scoped>

</style>
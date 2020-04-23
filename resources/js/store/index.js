export default{
    state:{
        category:[],
        post:[],
        blogPost:[],
        singlePost:[],
        categories:[],
        latestpost:[]
    },

    mutations:{
        grapAllCat(state,data){
            this.state.category = data
        },
        grapAllPost(state,data){
           this.state.post = data
        },
        allblogPost(state,data){
           this.state.blogPost = data
        },

        singlePost(state,data){
            this.state.singlePost = data
        },
        allCategory(state, data){
            this.state.categories = data
        },

        getLatestPost(state,data){
            this.state.latestpost = data
        },
        getPostByCategory(state, data){
            this.state.blogPost = data
        },
        getSearchPost(state,data){
            this.state.blogPost = data
        }


    },

    actions:{
        getCategory(context){
            axios.get('/category')
                .then( response => {
                    context.commit('grapAllCat',response.data.data)
                })
                .catch( e =>{
                    console.log(e)
                })
        },

        getPost(context){
            axios.get('/post')
                .then(response => {
                    context.commit('grapAllPost',response.data.data)
                })
                .catch(e =>{
                    console.log(e)
                })
        },

        getBlogPost(context){
            axios.get('/blog')
                .then(response =>{
                    context.commit('allblogPost', response.data)
                })
                .catch(e =>{
                    console.log(e)
                })
        },

        getSinglePost(context,payload){
            axios.get('/single-post/'+payload)
                .then( response => {
                    context.commit('singlePost',response.data)
                })
                .catch(e => {
                    console.log(e)
                })
        },

        getLatestPost(context){
            axios.get('/latest-post')
                .then(response =>{
                    context.commit('getLatestPost',response.data)
                })
                .catch(e=> {
                    console.log(e)
                })
        },
        getAllCategory(context){
            axios.get('/categories')
                .then( response =>{
                    context.commit('allCategory', response.data)
                })
                .catch(e =>{
                    console.log(e)
                })
        },

        getPostByCategory(context,payload){
            axios.get('/category/post/'+payload)
                .then( response => {
                    context.commit('getPostByCategory', response.data)
                })
                .catch( e => {
                    console.log(e)
                })
        },

        searchPost(context,payload){
            axios.get('/search/?s='+payload)
                .then( response =>{
                    context.commit('getSearchPost', response.data)
                })
                .catch( e =>{
                    console.log(e)
                })
        }

    },

    getters:{
        getAllCategory(state){
            return state.category
        },
        getAllPost(state){
            return state.post
        },
        getAllBlogPost(state){
            return state.blogPost
        },
        getSinglePost(state){
            return state.singlePost
        },
        getAllCategories(state){
            return state.categories
        },
        getLatestPost(state){
            return state.latestpost
        },


    },

}
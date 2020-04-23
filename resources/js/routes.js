//admin
import HomeComponent from './components/admin/HomeComponent'
//Category
import CategoryComponent from './components/admin/category/CategoryComponent'
import AddCategoryComponent from './components/admin/category/AddCategory'
import EditCategoryComponent from './components/admin/category/EditCategory'
import ShowCategoryComponent from './components/admin/category/ShowCategory'

//post
import PostComponent from './components/admin/post/postComponent'
import addPost from './components/admin/post/addPost'
import editPost from './components/admin/post/editPost'
import postDetails from './components/admin/post/post-details'


//frontend
import frontHome from './components/frontend/frontHome'
import blogPost from './components/frontend/blog/blogPost'
import postSingle from './components/frontend/blog/singleBlog'


export const routes = [

    //admin
    {
        path: '/dashboard',
        component: HomeComponent,
    },

    //category
    {
        path: '/category',
        component: CategoryComponent,
    },
    {
        path: '/add-category',
        component: AddCategoryComponent,
    },
    {
        path: '/edit-category/:id',
        component: EditCategoryComponent,
    },
    {
        path: '/category-details/:id',
        component: ShowCategoryComponent,
    },

    //post
    {
        path: '/post',
        component: PostComponent,
    },
    {
        path: '/add-post',
        component: addPost,
    },
    {
        path: '/edit-post/:id',
        component: editPost,
    },
    {
        path: '/post-details/:id',
        component: postDetails,
    },

    //frontend
    {
        path: '/',
        component: frontHome,
    },
    {
        path: '/blog',
        component: blogPost,
    },

    {
        path: '/blog/:id',
        component: postSingle,
    },
    {
        path: '/category/post/:id',
        component: blogPost,
    },



]
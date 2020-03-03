import Dashboard from './Components/Dashboard/Index'
//====================== Tours ======================
import OurTours from './Components/Tours/Ours/Index'
import TourCreate from './Components/Tours/Ours/Create'
import TourEdit from './Components/Tours/Ours/Edit'
import TourGallery from './Components/Tours/Ours/Gallery'
import TourItinerary from './Components/Tours/Ours/Itinerary'
//====================== Tours ======================

//====================== Tour Leaders ======================
import TourLeaders from './Components/TourLeaders/Index';
import TourLeaderCreate from './Components/TourLeaders/Create';
//====================== Tour Leaders ======================

// ========================= Posts =========================
import Posts from './Components/Posts/Index';
import PostsCreate from './Components/Posts/Create';
import PostsEdit from './Components/Posts/Edit';
import PostsComments from './Components/Posts/Comments';
// ========================= Posts =========================

// ========================= Categories =========================
import CategoriesIndex from './Components/Categories/Index';
import CategoriesCreate from './Components/Categories/Create';
// ========================= Categories =========================

// ========================= Comments =========================
import Comments from './Components/Comments/Index';
// ========================= Comments =========================


export default [
    {path: '/', name: 'داشبورد', component: Dashboard},

    {path: '/tours/ours', name: 'تورهای ما', component: OurTours},
    {path: '/tours/create', name: 'افزودن تور جدید', component: TourCreate},
    {path: '/tours/:id/edit', name: 'ویرایش تور', component: TourEdit},
    {path: '/tours/:id/gallery', name: 'گالری تور', component: TourGallery},
    {path: '/tours/:id/itinerary', name: 'برنامه سفر تور', component: TourItinerary},


    {path: '/tour-leaders', name: 'تور لیدر ها', component: TourLeaders},
    {path: '/tour-leaders/create', name: 'افزودن تور لیدر جدید', component: TourLeaderCreate},

    // ========================= Categories =========================
    {path: '/categories', name: 'دسته بندی ها', component: CategoriesIndex},
    {path: '/categories/create', name: 'افزودن دسته بندی', component: CategoriesCreate},
    // ========================= Categories =========================

    // ========================= Posts =========================
    {path: '/posts', name: 'پست', component: Posts},
    {path: '/posts/create', name: 'افزودن پست', component: PostsCreate},
    {path: '/posts/:id/edit', name: 'ویرایش پست', component: PostsEdit},
    {path: '/posts/:id/comments', name: 'نظرات', component: PostsComments},
    // ========================= Posts =========================

    // ========================= Comments  =========================
    {path: '/comments', name: 'نظرات', component: Comments},
    // ========================= Comments  =========================


]
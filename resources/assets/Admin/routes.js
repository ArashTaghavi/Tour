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

// ========================= Contacts =========================
import Contacts from './Components/Contacts/Index';
// ========================= Contacts =========================

// ========================= Settings =========================
import Settings from './Components/Settings/Index';
// ========================= Settings =========================

//====================== Hotels ======================
import OurHotels from './Components/Hotels/Ours/Index';
import HotelCreate from './Components/Hotels/Ours/Create';
import HotelEdit from './Components/Hotels/Ours/Edit';
import HotelGallery from './Components/Hotels/Ours/Gallery';

import HotelRoom from './Components/Hotels/Ours/Rooms/Index';
import HotelRoomCreate from './Components/Hotels/Ours/Rooms/Create';
import HotelRoomEdit from './Components/Hotels/Ours/Rooms/Edit';
import HotelRoomGallery from './Components/Hotels/Ours/Rooms/Gallery';
import HotelRoomDiscount from './Components/Hotels/Ours/Rooms/Discount';
//====================== Hotels ======================


export default [
    {path: '/', name: 'داشبورد', component: Dashboard},

    // ========================= Tours =========================
    {path: '/tours/ours', name: 'تورهای ما', component: OurTours},
    {path: '/tours/create', name: 'افزودن تور جدید', component: TourCreate},
    {path: '/tours/:id/edit', name: 'ویرایش تور', component: TourEdit},
    {path: '/tours/:id/gallery', name: 'گالری تور', component: TourGallery},
    {path: '/tours/:id/itinerary', name: 'برنامه سفر تور', component: TourItinerary},
    // ========================= Tours =========================


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
    {path: '/posts/:id/comments', name: 'نظرات پست', component: PostsComments},
    // ========================= Posts =========================

    // ========================= Hotels =========================
    {path: '/hotels/ours', name: 'هتل های ما', component: OurHotels},
    {path: '/hotels/create', name: 'افزودن هتل جدید', component: HotelCreate},
    {path: '/hotels/:id/edit', name: 'ویرایش هتل', component: HotelEdit},
    {path: '/hotels/:id/gallery', name: 'گالری هتل', component: HotelGallery},
    {path: '/hotels/:id/room', name: 'اتاق ها', component: HotelRoom},
    {path: '/hotels/:id/room/create', name: 'تعریف اتاق', component: HotelRoomCreate},
    {path: '/hotels/room/:id/edit', name: 'ویرایش اتاق', component: HotelRoomEdit},
    {path: '/hotels/room/:id/gallery', name: 'گالری اتاق', component: HotelRoomGallery},
    {path: '/hotels/room/:id/discount', name: 'تخفیف اتاق', component: HotelRoomDiscount},
    // ========================= Hotels =========================

    // ========================= Comments  =========================
    {path: '/comments', name: 'نظرات', component: Comments},
    // ========================= Comments  =========================

    // ========================= Comments  =========================
    {path: '/contacts', name: 'تماس با ما', component: Contacts},
    // ========================= Comments  =========================

    // ========================= Settings  =========================
    {path: '/settings', name: 'تنظیمات', component: Settings},
    // ========================= Settings  =========================


]
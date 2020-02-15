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


export default [
    {path: '/', name: 'داشبورد', component: Dashboard},

    {path: '/tours/ours', name: 'تورهای ما', component: OurTours},
    {path: '/tours/create', name: 'افزودن تور جدید', component: TourCreate},
    {path: '/tours/:id/edit', name: 'ویرایش تور', component: TourEdit},
    {path: '/tours/:id/gallery', name: 'گالری تور', component: TourGallery},
    {path: '/tours/:id/itinerary', name: 'برنامه سفر تور', component: TourItinerary},


    {path: '/tour-leaders', name: 'تور لیدر ها', component: TourLeaders},
    {path: '/tour-leaders/create', name: 'افزودن تور لیدر جدید', component: TourLeaderCreate}
]
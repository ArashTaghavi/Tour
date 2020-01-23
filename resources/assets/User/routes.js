import Dashboard from './Components/Dashboard/Index'


//====================== Tours ======================
import ReservedTours from './Components/ReservedTours/Index'
//====================== Tours ======================


export default [
    {path: '/', name: 'داشبورد', component: Dashboard},
    {path: '/tours/reserved-tours', name: 'تورهای رزرو شده', component: ReservedTours},
]
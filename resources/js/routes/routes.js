import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import ExampleComponent from '../components/ExampleComponent.vue'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import Questions from '../components/Questions.vue'
import Profile from '../components/profile.vue'

import Home from '../components/Home.vue'
import Levels from '../components/Levels.vue'
import Exams from '../components/Exams.vue'

import Telcs from '../components/Telcs.vue'
import ExamsTelc from '../components/ExamsTelc.vue'

import SubQuestions from '../components/SubQuestions.vue'
import ImageProcessing from '../components/ImageProcessing.vue'
import Result from '../components/Result.vue'
import ForgetPassword from '../components/ForgetPassword.vue'

import GoetheUserExam from '../components/GoetheUserExam.vue'
import GoetheReport from '../components/GoetheReport.vue'
import TelcReport from '../components/TelcReport.vue'
import TelcUserExam from '../components/TelcUserExam.vue'
import NoResult from '../components/NoResult.vue'
import myAnswer from '../components/myAnswer.vue'
import MyResult from '../components/MyResult.vue'

import PlacementTest from '../components/PlacementTest.vue'
import PlacementQuestions from '../components/PlacementQuestions.vue'
import PlacementResult from '../components/PlacementResult.vue'



const routes = [
    { path: '/placement-test', component: PlacementTest, name: 'PlacementTest' },
    { path: '/placement-questions', component: PlacementQuestions, name: 'PlacementQuestions' },
    { path: '/placement-result', component: PlacementResult, name: 'PlacementResult' },
    // { path: '/placement-result/:id', component: PlacementResult, name: 'PlacementResult' },


    { path: '/google/callback', component: Login, name: 'Login' },
    { path: '/home', component: Home, name: 'Home' },
    { path: '/', component: Home, name: 'Home' },
    { path: '/noresult', component: NoResult, name: 'NoResult' },

    { path: '/goethe-tests', component: Levels, name: 'Levels' },
    // { path: '/exams', component: Exams, name: 'Exams' },
    { path: '/goethe-tests/:slug', component: Exams, name: 'Exams' },

    { path: '/telc-tests', component: Telcs, name: 'Telcs' },
    { path: '/telc-tests/:slug', component: ExamsTelc, name: 'ExamsTelc' },



    { path: '/login', component: Login, name: 'Login' },
    { path: '/register', component: Register, name: 'Register' },
    { path: '/forgetpassword', component: ForgetPassword, name: 'ForgetPassword' },
    { path: '/profile', component: Profile, name: 'Profile' },
    { path: '/result', component: Result, name: 'Result' },
    // { path: '/resultt', component: Result, name: 'Result' },
    { path: '/my-result/:user_id/:exam_id', component: MyResult, name: 'MyResult' },



    { path: '/goethe-user-exam', component: GoetheUserExam, name: 'GoetheUserExam' },
    { path: '/my-answer', component: myAnswer, name: 'myAnswer' },


    { path: '/goethe-report/:id', component: GoetheReport, name: 'GoetheReport' },

    { path: '/telc-user-exam', component: TelcUserExam, name: 'TelcUserExam' },
    { path: '/telc-report/:id', component: TelcReport, name: 'TelcReport' },


    // { path: '/quiz', component: Quiz, name: 'Quiz' },
    { path: '/exam/:id', component: Questions, name: 'Questions' },

    { path: '/examplecomponent', component: ExampleComponent, name: 'ExampleComponent' },
    { path: '/imageprocessing', component: ImageProcessing, name: 'ImageProcessing' },

];

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history',
    base: '/'
})

export default router;

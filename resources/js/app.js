import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
import { getStorage } from "firebase/storage";
const firebaseConfig = {
    apiKey: "AIzaSyDjFzR38mC-RsJeydMWroQgRcPHjkm4zQo",
    authDomain: "stickershare-e6de1.firebaseapp.com",
    databaseURL: "https://stickershare-e6de1-default-rtdb.firebaseio.com",
    projectId: "stickershare-e6de1",
    storageBucket: "stickershare-e6de1.appspot.com",
    messagingSenderId: "616580344947",
    appId: "1:616580344947:web:9ba8f1e5a874b51f20ce06",
    measurementId: "G-DV2BVG3076"
};
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const storage = getStorage(app);

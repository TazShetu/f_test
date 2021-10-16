import {initializeApp} from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
import {getAnalytics} from "https://www.gstatic.com/firebasejs/9.1.3/firebase-analytics.js";
import {
    getStorage,
    ref,
    uploadBytesResumable,
    getDownloadURL
} from "https://www.gstatic.com/firebasejs/9.1.3/firebase-storage.js";

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


const metadata = {
    contentType: 'image'
};

document.getElementById('file').addEventListener('change', (e) => {
    const file = e.target.files[0];
    const storageRef = ref(storage, 'stickers/' + file.name);
    const uploadTask = uploadBytesResumable(storageRef, file, metadata);
    uploadTask.on('state_changed', (snapshot) => {
        const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        console.log('Upload is ' + progress + '% done');
        switch (snapshot.state) {
            case 'paused':
                console.log('Upload is paused');
                break;
            case 'running':
                console.log('Upload is running');
                break;
        }
    },
    (error) => {
        switch (error.code) {
            case 'storage/unauthorized':
                break;
            case 'storage/canceled':
                break;
            case 'storage/unknown':
                break;
        }
    },
    () => {
        getDownloadURL(uploadTask.snapshot.ref).then((downloadURL) => {
            console.log('File available at ', downloadURL);
        });
    });
});










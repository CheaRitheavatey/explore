// js library for 3d model that create 2 main component: camera and sence
import * as THREE from 'https://cdn.skypack.dev/three@0.129.0/build/three.module.js'
import {GLTFLoader} from 'https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js'
// camera
const camera = new THREE.PerspectiveCamera(
    // increase or decrease the angle to see more or less thing
    10,
    window.innerWidth / window.innerHeight,  // ratio of the frame
    0.1, // how near i can see
    1000 // how far i can see
);

// camera position
camera.position.z = 13;

// scene
const scene = new THREE.Scene();
let bird;

// load the bird.glb
const loader = new GLTFLoader();

// get the file info
loader.load('img/flying_bird.glb',
    // process when model loading is done
    function (gltf) {
        bird = gltf.scene;
        scene.add(bird);
    },
    // continue to run during loading to check file loading process
    function (xhr) {},
    // report error during loading
    function (error) {}
);

// render: create canvas api tag in html and use it to draw the screen
const renderer = new THREE.WebGLRenderer({alpha: true});
renderer.setSize(window.innerWidth, window.innerHeight);
document.getElementById('container3d').appendChild(renderer.domElement);

const reRender3d = () => {
    requestAnimationFrame(reRender3d);
    renderer.render(scene,camera);
};

reRender3d();




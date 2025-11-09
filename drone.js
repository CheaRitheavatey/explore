import * as THREE from 'https://cdn.skypack.dev/three@0.129.0/build/three.module.js';
import { GLTFLoader } from 'https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js';
import { gsap } from 'https://cdn.skypack.dev/gsap';

// === Camera ===
const camera = new THREE.PerspectiveCamera(20, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.z = 20;

// === Scene ===
const scene = new THREE.Scene();

// === Renderer ===
const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
document.getElementById('container3D').appendChild(renderer.domElement);

// === Lighting ===
const ambientLight = new THREE.AmbientLight(0xffffff, 1.3);
scene.add(ambientLight);

const topLight = new THREE.DirectionalLight(0xffffff, 1);
topLight.position.set(500, 500, 500);
scene.add(topLight);

// === Load Bird ===
let bird, mixer;
const loader = new GLTFLoader();

loader.load(
  'img/animated_drone.glb',
  function (gltf) {
    bird = gltf.scene;
    bird.scale.set(1.5, 1.5, 1.5); // adjust scale
    bird.position.set(5.5, 2, 0); // near top-right corner
    bird.rotation.y = 1.5;
    scene.add(bird);

    if (gltf.animations && gltf.animations.length > 0) {
      mixer = new THREE.AnimationMixer(bird);
      const action = mixer.clipAction(gltf.animations[0]);
      action.play();
    }
  },
  undefined,
  function (error) {
    console.error('Error loading model:', error);
  }
);

// === Animation loop ===
function animate() {
  requestAnimationFrame(animate);
  renderer.render(scene, camera);
  if (mixer) mixer.update(0.02);
}
animate();

// === Resize event ===
window.addEventListener('resize', () => {
  renderer.setSize(window.innerWidth, window.innerHeight);
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
});

const sectionPositions = [
  
  {
    class: 'container',
    position: {x: 5.5, y: 2, z: 0},
    rotation: {x: 0, y: 1.5, z: 0}
  },
  {
    class: 'hero-section',
    position: { x: 2.5, y: 2, z: 0 },
    rotation: { x: 0, y: 2.5, z: 0 },
  },
  {
    class: 'mosaic-gallery',
    position: { x: -6, y: 1, z: 0 },
    rotation: { x: 0, y: 4, z: 0 },
  },
  {
    class: 'must-see',
    position: { x: -1, y: -1, z: 0 },
    rotation: { x: 0, y: 4.5, z: 0 },
  },
  {
    class: 'info-section',
    position: { x: 5, y: -1, z: 0 },
    rotation: { x: 0, y: 2.5, z: 0 },
  },
  
]

function updateBirdPosition() {
  if (!bird) return;

  const sections = sectionPositions.map((s) => ({
    el: document.querySelector(`.${s.class}`),
    ...s,
  }));

  let activeSection = sections[0];

  sections.forEach((s) => {
    if (s.el) {
      const rect = s.el.getBoundingClientRect();
      if (rect.top <= window.innerHeight / 2 && rect.bottom >= 0) {
        activeSection = s;
      }
    }
  });

  gsap.to(bird.position, {
    x: activeSection.position.x,
    y: activeSection.position.y,
    z: activeSection.position.z,
    duration: 2,
    ease: 'power1.out',
  });

  gsap.to(bird.rotation, {
    x: activeSection.rotation.x,
    y: activeSection.rotation.y,
    z: activeSection.rotation.z,
    duration: 2,
    ease: 'power1.out',
  });
}

// === Event listeners ===
window.addEventListener('scroll', updateBirdPosition);
window.addEventListener('resize', () => {
  renderer.setSize(window.innerWidth, window.innerHeight);
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
});
<div class="gallery">
  <img src="../img/saigon.jpg" alt="a hot air balloon">
  <img src="../img/chobenthanh.jpg" alt="a sky photo of an old city">
  <img src="../img/hcm.jpg" alt="a small boat">
  <img src="../img/sanbay.jpg" alt="a forest">
</div>
<style>
     .gallery {
  --g: 8px;   /* the gap */
  --s: 400px; /* the size */
  
  display: grid;
  border-radius: 50%;
}
.gallery > img {
  grid-area: 1/1;
  width: 350px;
  aspect-ratio: 1;
  object-fit: cover;
  border-radius: 20px;
  cursor: pointer;
}
.gallery img:hover {
  --_i: 1;
  z-index: 1;
  transition: transform .2s, clip-path .3s .2s, z-index 0s;
}
.gallery:hover img {
  transform: translate(0,0);
}
.gallery > img:nth-child(1) {
  clip-path: polygon(50% 50%,calc(50%*var(--_i,0)) calc(120%*var(--_i,0)),0 calc(100%*var(--_i,0)),0 0,100% 0,100% calc(100%*var(--_i,0)),calc(100% - 50%*var(--_i,0)) calc(120%*var(--_i,0)));
  --_y: calc(-1*var(--g))
}
.gallery > img:nth-child(2) {
  clip-path: polygon(50% 50%,calc(100% - 120%*var(--_i,0)) calc(50%*var(--_i,0)),calc(100% - 100%*var(--_i,0)) 0,100% 0,100% 100%,calc(100% - 100%*var(--_i,0)) 100%,calc(100% - 120%*var(--_i,0)) calc(100% - 50%*var(--_i,0)));
  --_x: var(--g)
}
.gallery > img:nth-child(3) {
  clip-path: polygon(50% 50%,calc(100% - 50%*var(--_i,0)) calc(100% - 120%*var(--_i,0)),100% calc(100% - 120%*var(--_i,0)),100% 100%,0 100%,0 calc(100% - 100%*var(--_i,0)),calc(50%*var(--_i,0)) calc(100% - 120%*var(--_i,0)));
  --_y: var(--g)
}
.gallery > img:nth-child(4) {
  clip-path: polygon(50% 50%,calc(120%*var(--_i,0)) calc(50%*var(--_i,0)),calc(100%*var(--_i,0)) 0,0 0,0 100%,calc(100%*var(--_i,0)) 100%,calc(120%*var(--_i,0)) calc(100% - 50%*var(--_i,0)));
  --_x: calc(-1*var(--g))
}

.imggg {
  margin: 0;
  min-height: 65vh;
  display: grid;
  place-content: center;

  margin: 20px;
}

</style>
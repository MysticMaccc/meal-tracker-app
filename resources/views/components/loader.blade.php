<style>

  body {
    background-color: #ffffff;
  }

  .container1 {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.loader {
  display: flex;
  align-items: center;
}

.loader-shap {
  width: 2rem;
  height: 2rem;
  background-color: #ffde59;
  margin: 1rem;
  border-radius: 50%;
  animation: load_shap 1.2s ease infinite;
}

.loader-shap:nth-child(1) {
  animation-delay: 0.2s;
}

.loader-shap:nth-child(2) {
  animation-delay: 0.4s;
}

.loader-shap:nth-child(3) {
  animation-delay: 0.6s;
}

@keyframes load_shap {
  50% {
    transform: translateY(-50%);
    border-bottom: 16px solid #292929;
    box-shadow: 0 8rem 2rem rgba(255, 222, 89, 0.24);
  }
}
</style>




<div style="position: relative;">
  <!-- Your content here -->

  <!-- Transparent overlay -->
  <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9998; pointer-events: auto;" wire:loading></div>

  <!-- Loader -->
  <span style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;" wire:loading>
    <div class="container1" style="display:overlay; justify-content: center; align-items:center;">
      <div class="loader">
        <div class="loader-shap"></div>
        <div class="loader-shap"></div>
        <div class="loader-shap"></div>
      </div>
  </div>
  </span>
</div>

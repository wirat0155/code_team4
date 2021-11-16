<style>
.text-glow {
    text-shadow: 0 0 80px rgb(192 219 255 / 75%), 0 0 32px rgb(65 120 255 / 24%);
    font-size: 50px;
}

.text-gradient {
  background: linear-gradient(to right, #30CFD0, #c43ad6);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.main-panel {
    background: linear-gradient(to right, rgb(20, 30, 48), rgb(36, 59, 85));
    text-align: center;
}

.page-inner {
    background: none;
    padding-top: 45%;
    color: white;
}

.text-gradient:before{
  content:'';
  animation: animate infinite 8s;
}
@keyframes animate{
  0%{
    content: 'C'
  }
  10%{
    content: 'Co'
  }
  20%{
    content: 'Com'
  }
  30%{
    content: 'Comi'
  }
  40%{
    content: 'Comin'
  }
  50%{
    content: 'Coming'
  }
  60%{
    content: 'Coming S'
  }
  70%{
    content: 'Coming So'
  }
  80%{
    content: 'Coming Soo'
  }
  90%{
    content: 'Coming Soon'
  }
  100%{
    content: 'Coming Soon!'
  }
}

</style>

<div class="main-panel">
    <div class="content col-md-6 ml-auto mr-auto">
        <div class="page-inner">
            <h1 class="text-glow"> <span class="text-gradient"></span></h1>
        </div>
    </div>
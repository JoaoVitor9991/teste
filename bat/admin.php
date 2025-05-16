<?php
session_start();

// Verificar se o usuário está logado e é administrador
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.html?error=Você precisa ser administrador para acessar esta página.");
    exit();
}
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="pt-br">
  <head>
    <title>Área do Administrador - Tempero Secreto</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="description" content="Área do administrador do Tempero Secreto. Gerencie usuários, receitas e mais.">
    <meta name="keywords" content="admin, Tempero Secreto, gerenciamento">
    <link rel="icon" href="images/222.png" type="image/png">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
      .rd-navbar-login {
        margin-left: 15px;
      }
      @media (max-width: 767px) {
        .rd-navbar-login {
          margin-top: 10px;
          justify-content: center;
        }
        .rd-navbar-aside {
          display: flex;
          flex-direction: column;
          align-items: center;
        }
      }
    </style>
  </head>
  <body>
    <div class="preloader">
      <div class="wrapper-triangle">
        <div class="pen">
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="56px" data-xl-stick-up-offset="56px" data-xxl-stick-up-offset="56px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-inner-outer">
              <div class="rd-navbar-inner">
                <div class="rd-navbar-panel">
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap" aria-label="Abrir menu de navegação"><span></span></button>
                  <div class="rd-navbar-brand"><a class="brand" href="index.html"><img class="brand-logo-dark" src="images/222.png" alt="Logo Tempero Secreto" width="198" height="66"/></a></div>
                </div>
                <div class="rd-navbar-right rd-navbar-nav-wrap">
                  <div class="rd-navbar-aside">
                    <ul class="rd-navbar-contacts-2">
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                          <div class="unit-body"><a class="phone" href="tel:+5567991186677">+55 67 99118-6677</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                          <div class="unit-body"><a class="address" href="#">Vila Popular, 111, Campo Grande-MS</a></div>
                        </div>
                      </li>
                    </ul>
                    <ul class="list-share-2">
                      <li><a class="icon mdi mdi-facebook" href="https://facebook.com/temperosecreto" aria-label="Facebook do Tempero Secreto"></a></li>
                      <li><a class="icon mdi mdi-twitter" href="https://twitter.com/temperosecreto" aria-label="Twitter do Tempero Secreto"></a></li>
                      <li><a class="icon mdi mdi-instagram" href="https://instagram.com/temperosecreto" aria-label="Instagram do Tempero Secreto"></a></li>
                      <li><a class="icon mdi mdi-google-plus" href="https://plus.google.com/temperosecreto" aria-label="Google Plus do Tempero Secreto"></a></li>
                    </ul>
                    <div class="rd-navbar-login d-flex align-items-center">
                      <a href="logout.php" class="button button-sm button-primary">Sair</a>
                    </div>
                  </div>
                  <div class="rd-navbar-main">
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item"><a class="rd-nav-link" href="index.html">Inicio</a></li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="about-us.html">Quem somos</a></li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="typography.html">Receitas</a></li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="contacts.html">Contatos</a></li>
                    </ul>
                  </div>
                </div>
                <div class="rd-navbar-project-hamburger rd-navbar-project-hamburger-open rd-navbar-fixed-element-1" data-multitoggle=".rd-navbar-inner" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate" aria-label="Abrir galeria">
                  <div class="project-hamburger"><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span></div>
                </div>
                <div class="rd-navbar-project">
                  <div class="rd-navbar-project-header">
                    <h5 class="rd-navbar-project-title">Galeria</h5>
                    <div class="rd-navbar-project-hamburger rd-navbar-project-hamburger-close" data-multitoggle=".rd-navbar-inner" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate" aria-label="Fechar galeria">
                      <div class="project-close"><span></span><span></span></div>
                    </div>
                  </div>
                  <div class="rd-navbar-project-content rd-navbar-content">
                    <div>
                      <div class="row gutters-20" data-lightgallery="group">
                        <div class="col-6">
                          <article class="thumbnail thumbnail-creative"><a href="images/amarelo.jpg" data-lightgallery="item">
                              <div class="thumbnail-creative-figure"><img src="images/amarelo.jpg" alt="Prato colorido com legumes" width="195" height="164" loading="lazy"/></div>
                              <div class="thumbnail-creative-caption"><span class="icon thumbnail-creative-icon linearicons-magnifier"></span></div></a></article>
                        </div>
                        <div class="col-6">
                          <article class="thumbnail thumbnail-creative"><a href="images/project-2-1200x800-original.jpg" data-lightgallery="item">
                              <div class="thumbnail-creative-figure"><img src="images/project-2-195x164.jpg" alt="Sobremesa de chocolate" width="195" height="164" loading="lazy"/></div>
                              <div class="thumbnail-creative-caption"><span class="icon thumbnail-creative-icon linearicons-magnifier"></span></div></a></article>
                        </div>
                        <div class="col-6">
                          <article class="thumbnail thumbnail-creative"><a href="images/project-3-1200x800-original.jpg" data-lightgallery="item">
                              <div class="thumbnail-creative-figure"><img src="images/project-3-195x164.jpg" alt="Prato de massa italiana" width="195" height="164" loading="lazy"/></div>
                              <div class="thumbnail-creative-caption"><span class="icon thumbnail-creative-icon linearicons-magnifier"></span></div></a></article>
                        </div>
                        <div class="col-6">
                          <article class="thumbnail thumbnail-creative"><a href="images/project-4-1200x800-original.jpg" data-lightgallery="item">
                              <div class="thumbnail-creative-figure"><img src="images/project-4-195x164.jpg" alt="Suco refrescante de frutas" width="195" height="164" loading="lazy"/></div>
                              <div class="thumbnail-creative-caption"><span class="icon thumbnail-creative-icon linearicons-magnifier"></span></div></a></article>
                        </div>
                        <div class="col-6">
                          <article class="thumbnail thumbnail-creative"><a href="images/project-5-1200x800-original.jpg" data-lightgallery="item">
                              <div class="thumbnail-creative-figure"><img src="images/project-5-195x164.jpg" alt="Salada tropical" width="195" height="164" loading="lazy"/></div>
                              <div class="thumbnail-creative-caption"><span class="icon thumbnail-creative-icon linearicons-magnifier"></span></div></a></article>
                        </div>
                        <div class="col-6">
                          <article class="thumbnail thumbnail-creative"><a href="images/project-6-1200x800-original.jpg" data-lightgallery="item">
                              <div class="thumbnail-creative-figure"><img src="images/project-6-195x164.jpg" alt="Churrasco com acompanhamentos" width="195" height="164" loading="lazy"/></div>
                              <div class="thumbnail-creative-caption"><span class="icon thumbnail-creative-icon linearicons-magnifier"></span></div></a></article>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

      <!-- Breadcrumbs -->
      <section class="bg-gray-7">
        <div class="breadcrumbs-custom box-transform-wrap context-dark">
          <div class="container">
            <h3 class="breadcrumbs-custom-title">Área do Administrador</h3>
            <div class="breadcrumbs-custom-decor"></div>
          </div>
          <div class="box-transform" style="background-image: url(images/amarelo.jpg)"></div>
        </div>
        <div class="container">
          <ul class="breadcrumbs-custom-path">
            <li><a href="index.html">Inicio</a></li>
            <li class="active">Admin</li>
          </ul>
        </div>
      </section>

      <!-- Admin Section -->
      <section class="section section-lg bg-default text-md-left">
        <div class="container">
          <h4 class="text-spacing-25 text-transform-none">Bem-vindo, Administrador!</h4>
          <p>Aqui você pode gerenciar usuários, receitas e outras funcionalidades do site Tempero Secreto.</p>
          <div class="row row-30">
            <div class="col-md-6">
              <a href="gerenciar-usuarios.html" class="button button-lg button-primary button-winona">Gerenciar Usuários</a>
            </div>
            <div class="col-md-6">
              <a href="gerenciar-receitas.html" class="button button-lg button-primary button-winona">Gerenciar Receitas</a>
            </div>
          </div>
        </div>
      </section>

      <!-- Page Footer-->
      <footer class="section footer-modern context-dark footer-modern-2">
        <div class="footer-modern-line">
          <div class="container">
            <div class="row row-50">
              <div class="col-md-6 col-lg-4">
                <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">O que oferecemos</span></h5>
                <ul class="footer-modern-list d-inline-block d-sm-block wow fadeInUp">
                  <li><a href="massas.html">Massas</a></li>
                  <li><a href="#">Caseiras</a></li>
                  <li><a href="saladas.html">Saladas</a></li>
                  <li><a href="sucos.html">Sucos</a></li>
                  <li><a href="doces.html">Doces</a></li>
                  <li><a href="lanches.html">Lanches</a></li>
                  <li><a href="fitness.html">Fitness</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-3">
                <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">Informações</span></h5>
                <ul class="footer-modern-list d-inline-block d-sm-block wow fadeInUp">
                  <li><a href="about-us.html">Sobre nós</a></li>
                  <li><a href="#">Últimas notícias</a></li>
                  <li><a href="#">Menu</a></li>
                  <li><a href="#">FAQ</a></li>
                  <li><a href="#">Shop</a></li>
                  <li><a href="contacts.html">Contate-nos</a></li>
                </ul>
              </div>
              <div class="col-lg-4 col-xl-5">
                <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">Informações</span></h5>
                <p class="wow fadeInRight">Inscreva-se hoje para receber as últimas notícias e atualizações.</p>
                <form class="rd-form rd-mailform rd-form-inline rd-form-inline-sm oh-desktop" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                  <div class="form-wrap wow slideInUp">
                    <input class="form-input" id="subscribe-form-2-email" type="email" name="email" data-constraints="@Email @Required" aria-required="true"/>
                    <label class="form-label" for="subscribe-form-2-email">Entre com seu E-mail</label>
                  </div>
                  <div class="form-button form-button-2 wow slideInRight">
                    <button class="button button-sm button-icon-3 button-primary button-winona" type="submit"><span class="d-none d-xl-inline-block">Inscreva-se</span><span class="icon mdi mdi-telegram d-xl-none"></span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-modern-line-2">
          <div class="container">
            <div class="row row-30 align-items-center">
              <div class="col-sm-6 col-md-7 col-lg-4 col-xl-4">
                <div class="row row-30 align-items-center text-lg-center">
                  <div class="col-md-7 col-xl-6"><a class="brand" href="index.html"><img src="images/222.png" alt="Logo Tempero Secreto" width="198" height="66"/></a></div>
                  <div class="col-md-5 col-xl-6">
                    <div class="iso-1"><span><img src="images/like-icon-58x25.png" alt="Ícone de curtida" width="58" height="25"/></span><span class="iso-1-big">6</span></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-12 col-lg-8 col-xl-8 oh-desktop">
                <div class="group-xmd group-sm-justify">
                  <div class="footer-modern-contacts wow slideInUp">
                    <div class="unit unit-spacing-sm align-items-center">
                      <div class="unit-left"><span class="icon icon-24 mdi mdi-phone"></span></div>
                      <div class="unit-body"><a class="phone" href="tel:+5567991186677">+55 67 99118-6677</a></div>
                    </div>
                  </div>
                  <div class="footer-modern-contacts wow slideInDown">
                    <div class="unit unit-spacing-sm align-items-center">
                      <div class="unit-left"><span class="icon mdi mdi-email"></span></div>
                      <div class="unit-body"><a class="mail" href="mailto:contato@temperosecreto.com">contato@temperosecreto.com</a></div>
                    </div>
                  </div>
                  <div class="wow slideInRight">
                    <ul class="list-inline footer-social-list footer-social-list-2 footer-social-list-3">
                      <li><a class="icon mdi mdi-facebook" href="https://facebook.com/temperosecreto" aria-label="Facebook do Tempero Secreto"></a></li>
                      <li><a class="icon mdi mdi-twitter" href="https://twitter.com/temperosecreto" aria-label="Twitter do Tempero Secreto"></a></li>
                      <li><a class="icon mdi mdi-instagram" href="https://instagram.com/temperosecreto" aria-label="Instagram do Tempero Secreto"></a></li>
                      <li><a class="icon mdi mdi-google-plus" href="https://plus.google.com/temperosecreto" aria-label="Google Plus do Tempero Secreto"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-modern-line-3">
          <div class="container">
            <div class="row row-10 justify-content-between">
              <div class="col-md-6"><span>Vila Popular, 111, Campo Grande-MS</span></div>
              <div class="col-md-auto">
                <p class="rights"><span>© </span><span class="copyright-year"></span><span>. </span><span>Insted</span></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script defer src="js/core.min.js"></script>
    <script defer src="js/script.js"></script>
  </body>
</html>
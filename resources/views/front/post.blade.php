@extends('front.layouts.app')
@section('title', 'News | Herbalist')
@section('data-page', 'post2')
@section('content')
    <header class="page">
            <div class="page_main container-fluid"></div>
            <div class="container">
                <ul class="page_breadcrumbs d-flex flex-wrap">
                    <li class="page_breadcrumbs-item">
                        <a class="link" href="{{route('home')}}">Home</a>
                    </li>

                    <li class="page_breadcrumbs-item">
                        <a class="link" href="{{route('blog')}}">News</a>
                    </li>

                    <li class="page_breadcrumbs-item current">
                        <span>Get the Best Out of Your Cannabis Experience</span>
                    </li>
                </ul>
            </div>
        </header>
        <!-- Single post content start -->
        <main class="post section">
            <div class="container d-lg-flex justify-content-between">
                <div class="post_content">
                    <article class="post_main">
                        <h1 class="post_header post_header--main">Get the Best Out of Your Cannabis Experience</h1>
                        <div class="metadata metadata--info d-flex">
                            <span class="metadata_item d-flex align-items-center">
                                <i class="icon-calendar_day secondary icon"></i>
                                September 30, 2021
                            </span>
                            <a class="metadata_item d-flex align-items-center" href="#postComments">
                                <i class="icon-comments secondary icon"></i>
                                <span class="metadata_item-text">3 Comments</span>
                                <span class="metadata_item-number">3</span>
                            </a>
                        </div>
                        <p class="post_text">
                            Turpis egestas pretium aenean pharetra magna ac placerat vestibulum. Vitae congue eu consequat ac felis. Varius
                            morbi enim nunc faucibus a pellentesque sit amet porttitor. Pulvinar proin gravida hendrerit lectus a. Ultrices
                            vitae auctor eu augue ut lectus arcu. Aliquam id diam maecenas ultricies mi eget mauris pharetra et. Sit amet
                            risus nullam eget. Sed ullamcorper morbi tincidunt ornare.
                        </p>
                        <h2 class="post_header">Sed id semper risus in hendrerit gravida rutrum</h2>
                        <p class="post_text">
                            Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Massa ultricies mi quis hendrerit. Purus sit
                            amet volutpat consequat mauris nunc congue nisi. Aenean vel elit scelerisque mauris pellentesque. Netus et
                            malesuada fames ac turpis egestas integer eget. Nunc non blandit massa enim nec dui nunc
                        </p>
                        <div class="wrapper--lists d-xl-flex justify-content-between">
                            <ul class="post_list">
                                <li class="post_list-item">Massa massa ultricies mi quis hendrerit</li>
                                <li class="post_list-item">Facilisi cras fermentum odio eu feugiat</li>
                                <li class="post_list-item">Placerat vestibulum lectus mauris ultrices eros</li>
                                <li class="post_list-item">Nullam non nisi est sit amet facilisis</li>
                            </ul>
                            <ul class="post_list ordered">
                                <li class="post_list-item d-flex align-items-start">
                                    <span class="number">1.</span>
                                    Lacus sed viverra tellus in hac habitasse
                                </li>
                                <li class="post_list-item d-flex align-items-start">
                                    <span class="number">2.</span>
                                    Gravida neque convallis a cras semper
                                </li>
                                <li class="post_list-item d-flex align-items-start">
                                    <span class="number">3.</span>
                                    Euismod elementum nisi quis eleifend
                                </li>
                                <li class="post_list-item d-flex align-items-start">
                                    <span class="number">4.</span>
                                    Lacus sed turpis tincidunt id aliquet
                                </li>
                            </ul>
                        </div>
                        <h2 class="post_header">Egestas sed tempus urna et pharetra</h2>
                        <p class="post_text">
                            Elit scelerisque mauris pellentesque pulvinar. Quam adipiscing vitae proin sagittis nisl. Tempor commodo
                            ullamcorper a lacus vestibulum sed arcu non odio. In dictum non consectetur a. Nunc vel risus commodo viverra
                        </p>
                        <ul class="post_media d-flex flex-column flex-md-row justify-content-between">
                            <li class="post_media-img">
                                <picture>
                                    <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                    <img class="lazy" data-src="front/img/placeholder.jpg" src="front/img/placeholder.jpg" alt="media" />
                                </picture>
                            </li>
                            <li class="post_media-img">
                                <picture>
                                    <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                    <img class="lazy" data-src="front/img/placeholder.jpg" src="front/img/placeholder.jpg" alt="media" />
                                </picture>
                            </li>
                        </ul>
                        <p class="post_text">
                            Commodo viverra maecenas accumsan lacus vel facilisis volutpat. Nec tincidunt praesent semper feugiat nibh sed.
                            Felis eget nunc lobortis mattis aliquam. Iaculis eu non diam phasellus vestibulum. Aliquam id diam maecenas
                            ultricies mi eget mauris.
                        </p>
                        <div class="post_highlight">
                            <h2 class="post_header">Velit ut tortor pretium viverra suspendisse potenti</h2>
                            <p class="post_text">
                                Quisque non tellus orci ac auctor augue mauris augue neque. Lacus sed viverra tellus in hac habitasse platea
                                dictumst. Euismod elementum nisi quis eleifend quam adipiscing vitae proin.
                            </p>
                            <div class="post_quote">
                                <q class="post_quote-text">
                                    Vitae purus faucibus ornare suspendisse sed. Elementum curabitur vitae nunc sed velit dignissim sodales
                                    ut. Duis tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. Venenatis lectus magna
                                    fringilla urna porttitor. Quam id leo in vitae turpis.
                                </q>
                                <span class="post_quote-author"> James Wagner </span>
                            </div>
                            <p class="post_text">
                                Dui faucibus in ornare quam viverra orci sagittis eu. Libero nunc consequat interdum varius sit amet. Ut
                                aliquam purus sit amet luctus venenatis lectus. Pharetra pharetra massa massa ultricies mi quis. Egestas
                                tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Lectus sit amet est placerat
                            </p>
                        </div>
                        <div
                            class="wrapper wrapper--tags d-md-flex flex-lg-column flex-xl-row flex-xl-wrap align-items-center align-items-lg-start justify-content-between"
                        >
                            <div class="post_tags d-sm-flex align-items-center">
                                <h5 class="post_tags-header">Tags</h5>
                                <ul class="post_tags-list d-flex flex-wrap">
                                    <li class="list-item">
                                        <a class="link d-inline-flex align-items-center justify-content-center" href="#">Vaping</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="link d-inline-flex align-items-center justify-content-center" href="#">Cannabis</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="link d-inline-flex align-items-center justify-content-center" href="#">Flower</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="socials d-flex align-items-center">
                                <li class="list-item">
                                    <a
                                        class="link d-inline-flex align-items-center justify-content-center"
                                        href="https://facebook.com"
                                        target="_blank"
                                        rel="noopener norefferer"
                                    >
                                        <i class="icon-facebook icon"></i>
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a
                                        class="link d-inline-flex align-items-center justify-content-center"
                                        href="https://instagram.com"
                                        target="_blank"
                                        rel="noopener norefferer"
                                    >
                                        <i class="icon-instagram icon"></i>
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a
                                        class="link d-inline-flex align-items-center justify-content-center"
                                        href="https://twitter.com"
                                        target="_blank"
                                        rel="noopener norefferer"
                                    >
                                        <i class="icon-twitter icon"></i>
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a
                                        class="link d-inline-flex align-items-center justify-content-center"
                                        href="https://whatsapp.com"
                                        target="_blank"
                                        rel="noopener norefferer"
                                    >
                                        <i class="icon-whatsapp icon"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <div class="post_footer">
                        <div class="post_footer-author d-flex flex-column flex-sm-row align-items-xl-center">
                            <picture>
                                <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                <img
                                    class="lazy post_footer-author_avatar"
                                    data-src="front/img/placeholder.jpg"
                                    src="front/img/placeholder.jpg"
                                    alt="media"
                                />
                            </picture>
                            <div class="post_footer-author_about">
                                <h4 class="name">James Wagner</h4>
                                <p class="bio">
                                    Nec ullamcorper sit amet risus nullam eget. Sed odio morbi quis commodo odio. Arcu cursus euismod quis
                                    viverra. Sed adipiscing diam donec adipiscing.Tempor orci eu lobortis elementum nibh. Duis tristique
                                    sollicitudin nibh sit amet commodo nulla facilisi
                                </p>
                            </div>
                        </div>
                        <div class="post_footer-nav d-sm-flex justify-content-between">
                            <div class="post_footer-nav_block post_footer-nav_block--prev d-flex flex-column">
                                <a class="nav-link nav-link--prev d-inline-flex align-items-center" href="#">
                                    <i class="icon-caret_left icon"></i>
                                    Previous Post
                                </a>
                                <a class="post-title" href="#"> Get the Best Out of Your Cannabis Experience </a>
                            </div>
                            <div class="post_footer-nav_block post_footer-nav_block--next d-flex flex-column align-items-end">
                                <a class="nav-link nav-link--next d-inline-flex align-items-center" href="#">
                                    Next Post
                                    <i class="icon-caret_right icon"></i>
                                </a>
                                <a class="post-title" href="#"> Factors in Choosing Cannabis Products </a>
                            </div>
                        </div>
                    </div>
                    <section class="comments" id="postComments">
                        <h2 class="comments_header">3 Comments</h2>
                        <div class="comments_item d-sm-flex" data-order="1">
                            <picture>
                                <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                <img class="lazy avatar" data-src="front/img/placeholder.jpg" src="front/img/placeholder.jpg" alt="media" />
                            </picture>
                            <div class="main">
                                <div class="panel d-flex flex-column flex-md-row align-items-md-center">
                                    <div class="wrapper flex-grow-1 d-md-flex flex-md-row flex-lg-column flex-xl-row">
                                        <h5 class="panel_name">Dawn Fowler</h5>
                                        <span class="panel_timestamp">September 30, 2021 at 9:52 am</span>
                                    </div>
                                    <a class="panel_btn btn--underline" href="#">Reply</a>
                                </div>
                                <p class="text">
                                    Quis blandit turpis cursus in hac habitasse platea dictumst. Ultricies integer quis auctor elit sed
                                    vulputate mi sit amet. Scelerisque fermentum dui faucibus in ornare. Convallis posuere morbi leo urna
                                    molestie at elementum. Quis auctor elit sed vulputate mi. In nulla posuere sollicitudin aliquam ultrices
                                </p>
                            </div>
                        </div>
                        <div class="comments_item d-sm-flex" data-reply="true">
                            <picture>
                                <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                <img class="lazy avatar" data-src="front/img/placeholder.jpg" src="front/img/placeholder.jpg" alt="media" />
                            </picture>
                            <div class="main">
                                <div class="panel d-flex flex-column flex-md-row align-items-md-center">
                                    <div class="wrapper flex-grow-1 d-md-flex flex-md-row flex-lg-column flex-xl-row">
                                        <h5 class="panel_name">Charles Sanchez</h5>
                                        <span class="panel_timestamp">September 30, 2021 at 10:58 am</span>
                                    </div>
                                    <a class="panel_btn btn--underline" href="#">Reply</a>
                                </div>
                                <p class="text">
                                    Aliquam sem fringilla ut morbi tincidunt augue. Viverra aliquet eget sit amet tellus cras adipiscing
                                    enim
                                </p>
                            </div>
                        </div>
                        <div class="comments_item d-sm-flex">
                            <picture>
                                <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                <img class="lazy avatar" data-src="front/img/placeholder.jpg" src="front/img/placeholder.jpg" alt="media" />
                            </picture>
                            <div class="main">
                                <div class="panel d-flex flex-column flex-md-row align-items-md-center">
                                    <div class="wrapper flex-grow-1 d-md-flex flex-md-row flex-lg-column flex-xl-row">
                                        <h5 class="panel_name">Dawn Fowler</h5>
                                        <span class="panel_timestamp">September 30, 2021 at 9:52 am</span>
                                    </div>
                                    <a class="panel_btn btn--underline" href="#">Reply</a>
                                </div>
                                <p class="text">
                                    Quis blandit turpis cursus in hac habitasse platea dictumst. Ultricies integer quis auctor elit sed
                                    vulputate mi sit amet. Scelerisque fermentum dui faucibus in ornare. Convallis posuere morbi leo urna
                                    molestie at elementum. Quis auctor elit sed vulputate mi. In nulla posuere sollicitudin aliquam ultrices
                                </p>
                            </div>
                        </div>
                    </section>
                    <section class="reply">
                        <h2 class="reply_header">Leave a Reply</h2>
                        <form
                            class="reply_form d-flex flex-column flex-md-row flex-wrap justify-content-between"
                            action="#"
                            method="post"
                            id="postReplyForm"
                            data-type="userComment"
                        >
                            <div class="field-wrapper">
                                <label class="label" for="postReplyName">Your Name</label>
                                <input class="field required" type="text" id="postReplyName" placeholder="Your Name" />
                            </div>
                            <div class="field-wrapper">
                                <label class="label" for="postReplyEmail">Your Email</label>
                                <input
                                    class="field required"
                                    type="text"
                                    data-type="email"
                                    id="postReplyEmail"
                                    placeholder="you@example.com"
                                />
                            </div>
                            <div class="field-wrapper fluid">
                                <label class="label" for="postReplyContent">Message</label>
                                <textarea
                                    class="field field--message required"
                                    id="postReplyContent"
                                    placeholder="Type Your Message"
                                ></textarea>
                            </div>
                            <button class="btn" type="submit">Submit</button>
                        </form>
                    </section>
                </div>
                <div class="widgets">
                    <div class="widgets-item widgets-item--search">
                        <h4 class="widgets-item_header">Search by Posts</h4>
                        <form class="form--search" data-type="searchPosts" action="#" method="get">
                            <input class="field required" type="text" placeholder="Type something..." />
                            <button class="btn" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="widgets-item widgets-item--categories">
                        <h4 class="widgets-item_header d-flex align-items-center">
                            <span class="leaf">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.584 22.1185C18.1022 22.2634 16.697 21.9115 15.3804 20.9798C15.3517 20.9591 15.3229 20.9409 15.2942 20.9202C16.089 22.1625 16.1225 23.3349 16.539 24C15.4043 23.4643 14.4707 22.7914 13.8507 21.9089C13.7574 22.0486 13.7215 22.2272 13.8172 22.4808C13.032 21.7872 12.4312 20.6899 11.9524 19.3208C11.9476 19.3312 11.9452 19.3415 11.9405 19.3493C11.4641 20.7054 10.8656 21.7924 10.0828 22.4808C10.181 22.2272 10.1451 22.0486 10.0493 21.9089C9.42932 22.7914 8.49572 23.4643 7.36104 24C7.77757 23.3375 7.81109 22.1625 8.60584 20.9202C8.56514 20.9487 8.52445 20.9798 8.48615 21.0031C7.17911 21.9141 5.78829 22.2609 4.31848 22.1185C4.56983 22.0228 4.73979 21.8649 4.79964 21.632C2.34117 21.7614 1.12031 20.8711 0 19.898C0.0406952 19.9006 0.0837842 19.9057 0.126873 19.9083C1.57993 19.9808 3.97616 18.5651 6.62853 17.9052C6.61656 17.9 6.6022 17.8948 6.59262 17.8896C3.61709 16.6784 1.9031 14.7451 1.01977 12.3408C1.17537 12.5246 1.35012 12.6178 1.54402 12.6204C0.608034 9.7735 0.677455 7.77035 1.37885 6.29774C1.49375 8.05762 6.66204 9.6855 8.90028 13.3968C8.89071 13.3528 8.88113 13.314 8.87395 13.27C8.32576 10.8087 8.47418 8.07315 9.16121 5.13053C9.20908 5.79307 9.31202 6.22269 9.69982 6.49185C9.91048 3.89085 10.643 1.79971 11.95 0.267578C13.2571 1.79971 13.9896 3.89085 14.2002 6.49185C14.588 6.22269 14.691 5.79307 14.7388 5.13053C15.4378 8.12491 15.5791 10.9045 14.9974 13.3968C15.0309 13.3372 15.0668 13.2829 15.1027 13.2234C15.1051 13.2208 15.1051 13.2182 15.1075 13.213C17.2691 9.84079 21.8318 8.22067 22.4494 6.59796V6.59537C22.4901 6.49702 22.5116 6.39609 22.5188 6.29515C23.2202 7.76776 23.2896 9.77091 22.3536 12.6178C22.5475 12.6126 22.7247 12.5194 22.8779 12.3383C21.9898 14.7529 20.2662 16.6914 17.2691 17.9026C17.3074 17.9129 17.3457 17.9233 17.3816 17.931C20.0651 18.6246 22.4781 20.0584 23.8977 19.8954C22.7797 20.8685 21.5589 21.7588 19.098 21.6294C19.1627 21.8675 19.3302 22.0228 19.584 22.1185Z"
                                        fill="#258F67"
                                    />
                                    <path
                                        d="M12.3627 16.6732C12.3627 16.6732 9.45119 17.3788 6.85934 17.5985C3.80271 16.3889 2.04202 14.4581 1.13462 12.057C1.29446 12.2405 1.47398 12.3335 1.67316 12.3361C0.711665 9.49296 0.782978 7.49241 1.50348 6.02173C1.50594 6.02173 1.79857 15.6032 12.3627 16.6732Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M11.7116 16.7864C11.7116 16.7864 10.0667 16.3102 8.77415 13.0731C8.25027 10.5985 8.39211 7.84804 9.04868 4.88941C9.09443 5.55556 9.1928 5.98751 9.56341 6.25813C9.76473 3.64299 10.4648 1.54046 11.7138 0C11.2174 6.38824 10.904 12.4824 11.7116 16.7864Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M22.3487 6.552C20.8856 12.8009 17.0985 15.79 12.0293 16.9711C13.0596 16.6693 14.1769 15.0226 15.1296 13.2119C15.132 13.2093 15.132 13.2067 15.1343 13.2015C17.2608 9.81172 21.7419 8.18576 22.3487 6.552Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M23.9996 19.4003C19.2292 19.9109 15.026 19.3955 12.0508 16.6816C12.0508 16.6816 14.9231 17.4656 17.4842 17.5807C20.1675 18.2208 22.5778 19.5513 23.9996 19.4003Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M16.4192 23.6094C14.6332 21.5095 13.2143 19.1771 12.0742 16.6633C13.1894 18.0582 14.3113 19.4709 15.3222 20.6281C15.295 20.6077 15.2678 20.5898 15.2406 20.5694C15.9931 21.7982 16.0249 22.9554 16.4192 23.6094Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.2037 19.1457C11.7042 20.4843 11.0767 21.5573 10.256 22.2368C10.3589 21.9864 10.3213 21.8102 10.2209 21.6722C9.57084 22.5433 8.59201 23.2076 7.40234 23.7364C9.34998 21.5445 10.9713 19.2351 12.2137 16.7903C12.3342 17.2476 12.299 18.1545 12.2037 19.1457Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.0016 16.896C11.9154 17.0026 10.0093 19.3149 8.54143 20.9535C7.23401 21.8691 5.84277 22.2176 4.37251 22.0746C4.62394 21.9783 4.79395 21.8197 4.85382 21.5856C2.39461 21.7156 1.17339 20.8209 0.0527344 19.8429C0.0934418 19.8455 0.136544 19.8507 0.179646 19.8533C4.51858 20.2227 8.54862 19.5204 12.0016 16.896Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.811 16.7992C12.811 17.2789 12.4464 17.6674 11.9963 17.6674C11.5462 17.6674 11.1816 17.2789 11.1816 16.7992C11.1816 16.3195 11.5462 15.9309 11.9963 15.9309C12.4464 15.9309 12.811 16.3195 12.811 16.7992Z"
                                        fill="#214842"
                                    />
                                </svg>
                            </span>
                            Categories List
                        </h4>
                        <nav class="widgets-item_nav">
                            <div class="wrapper">
                                <a
                                    class="nav-link d-inline-flex align-items-center"
                                    href="#"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#healthSubmenu"
                                    aria-expanded="true"
                                    aria-controls="healthSubmenu"
                                    data-level="first"
                                >
                                    <i class="icon-caret_right icon"></i>
                                    Health
                                </a>
                            </div>
                            <ul class="nav-list nav-list--main collapse show" id="healthSubmenu">
                                <li>
                                    <a
                                        class="nav-link d-inline-flex align-items-center"
                                        href="#"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#depressionSubmenu"
                                        aria-expanded="false"
                                        aria-controls="depressionSubmenu"
                                        data-level="second"
                                    >
                                        <i class="icon-caret_right icon"></i>
                                        Depression
                                    </a>
                                    <ul class="collapse nav-list--sub" id="depressionSubmenu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-level="third">Lorem</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-level="third">Ipsum</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a
                                        class="nav-link d-inline-flex align-items-center"
                                        href="#"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#eyeSubmenu"
                                        aria-expanded="false"
                                        aria-controls="eyeSubmenu"
                                        data-level="second"
                                    >
                                        <i class="icon-caret_right icon"></i>
                                        Eye Disease
                                    </a>
                                    <ul class="collapse nav-list" id="eyeSubmenu">
                                        <li class="nav-item">
                                            <a
                                                class="nav-link d-inline-flex align-items-center"
                                                href="#"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#glaucomaSubmenu"
                                                aria-expanded="false"
                                                aria-controls="glaucomaSubmenu"
                                                data-level="third"
                                            >
                                                <i class="icon-caret_right icon"></i>
                                                Glaucoma
                                            </a>
                                            <ul class="collapse nav-list" id="glaucomaSubmenu">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#" data-level="fourth">Lorem</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#" data-level="fourth">Ipsum</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#" data-level="fourth">Dolor sit amet</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link d-inline-flex align-items-center"
                                                href="#"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#blindnessSubmenu"
                                                aria-expanded="false"
                                                aria-controls="blindnessSubmenu"
                                                data-level="third"
                                            >
                                                <i class="icon-caret_right icon"></i>
                                                Neurodegenerative Blindness
                                            </a>
                                            <ul class="collapse nav-list" id="blindnessSubmenu">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#" data-level="fourth">Lorem</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#" data-level="fourth">Ipsum</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#" data-level="fourth">Dolor sit amet</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link d-inline-flex align-items-center"
                                                href="#"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#diabeticSubmenu"
                                                aria-expanded="false"
                                                aria-controls="diabeticSubmenu"
                                                data-level="third"
                                            >
                                                <i class="icon-caret_right icon"></i>
                                                Diabetic Retinopathy
                                            </a>
                                            <ul class="collapse nav-list" id="diabeticSubmenu">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#" data-level="fourth">Lorem</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#" data-level="fourth">Ipsum</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link d-inline-flex align-items-center"
                                        href="#"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#epilepsySubmenu"
                                        aria-expanded="false"
                                        aria-controls="epilepsySubmenu"
                                        data-level="second"
                                    >
                                        <i class="icon-caret_right icon"></i>
                                        Epilepsy
                                    </a>
                                    <ul class="collapse nav-list" id="epilepsySubmenu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-level="third">Lorem</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-level="third">Ipsum</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link d-inline-flex align-items-center"
                                        href="#"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#cancerSubmenu"
                                        aria-expanded="false"
                                        aria-controls="cancerSubmenu"
                                        data-level="second"
                                    >
                                        <i class="icon-caret_right icon"></i>
                                        Cancer
                                    </a>
                                    <ul class="collapse nav-list" id="cancerSubmenu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-level="third">Lorem</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-level="third">Ipsum</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a
                                class="nav-link d-inline-flex align-items-center"
                                href="#"
                                data-bs-toggle="collapse"
                                data-bs-target="#ediblesSubmenu"
                                aria-expanded="false"
                                aria-controls="ediblesSubmenu"
                                data-level="first"
                            >
                                <i class="icon-caret_right icon"></i>
                                Edibles
                            </a>
                            <ul class="collapse nav-list" id="ediblesSubmenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Lorem</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Ipsum</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Dolor sit amet</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Massa ultricies mi quis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Nunc non blandit</a>
                                </li>
                            </ul>
                            <div class="wrapper">
                                <a
                                    class="nav-link d-inline-flex align-items-center"
                                    href="#"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#growSubmenu"
                                    aria-expanded="false"
                                    aria-controls="growSubmenu"
                                    data-level="first"
                                >
                                    <i class="icon-caret_right icon"></i>
                                    Grow
                                </a>
                            </div>
                            <ul class="collapse" id="growSubmenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Dolor sit amet</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Massa ultricies mi quis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Nunc non blandit</a>
                                </li>
                            </ul>
                            <div class="wrapper">
                                <a
                                    class="nav-link d-inline-flex align-items-center"
                                    href="#"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#cbdSubmenu"
                                    aria-expanded="false"
                                    aria-controls="cbdSubmenu"
                                    data-level="first"
                                >
                                    <i class="icon-caret_right icon"></i>
                                    CBD
                                </a>
                            </div>
                            <ul class="collapse nav-list" id="cbdSubmenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Dolor sit amet</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Massa ultricies mi quis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Nunc non blandit</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Ut lectus arcu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-level="second">Facilisi cras fermentum</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="widgets-item widgets-item--recent">
                        <h4 class="widgets-item_header d-flex align-items-center">
                            <span class="leaf">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.584 22.1185C18.1022 22.2634 16.697 21.9115 15.3804 20.9798C15.3517 20.9591 15.3229 20.9409 15.2942 20.9202C16.089 22.1625 16.1225 23.3349 16.539 24C15.4043 23.4643 14.4707 22.7914 13.8507 21.9089C13.7574 22.0486 13.7215 22.2272 13.8172 22.4808C13.032 21.7872 12.4312 20.6899 11.9524 19.3208C11.9476 19.3312 11.9452 19.3415 11.9405 19.3493C11.4641 20.7054 10.8656 21.7924 10.0828 22.4808C10.181 22.2272 10.1451 22.0486 10.0493 21.9089C9.42932 22.7914 8.49572 23.4643 7.36104 24C7.77757 23.3375 7.81109 22.1625 8.60584 20.9202C8.56514 20.9487 8.52445 20.9798 8.48615 21.0031C7.17911 21.9141 5.78829 22.2609 4.31848 22.1185C4.56983 22.0228 4.73979 21.8649 4.79964 21.632C2.34117 21.7614 1.12031 20.8711 0 19.898C0.0406952 19.9006 0.0837842 19.9057 0.126873 19.9083C1.57993 19.9808 3.97616 18.5651 6.62853 17.9052C6.61656 17.9 6.6022 17.8948 6.59262 17.8896C3.61709 16.6784 1.9031 14.7451 1.01977 12.3408C1.17537 12.5246 1.35012 12.6178 1.54402 12.6204C0.608034 9.7735 0.677455 7.77035 1.37885 6.29774C1.49375 8.05762 6.66204 9.6855 8.90028 13.3968C8.89071 13.3528 8.88113 13.314 8.87395 13.27C8.32576 10.8087 8.47418 8.07315 9.16121 5.13053C9.20908 5.79307 9.31202 6.22269 9.69982 6.49185C9.91048 3.89085 10.643 1.79971 11.95 0.267578C13.2571 1.79971 13.9896 3.89085 14.2002 6.49185C14.588 6.22269 14.691 5.79307 14.7388 5.13053C15.4378 8.12491 15.5791 10.9045 14.9974 13.3968C15.0309 13.3372 15.0668 13.2829 15.1027 13.2234C15.1051 13.2208 15.1051 13.2182 15.1075 13.213C17.2691 9.84079 21.8318 8.22067 22.4494 6.59796V6.59537C22.4901 6.49702 22.5116 6.39609 22.5188 6.29515C23.2202 7.76776 23.2896 9.77091 22.3536 12.6178C22.5475 12.6126 22.7247 12.5194 22.8779 12.3383C21.9898 14.7529 20.2662 16.6914 17.2691 17.9026C17.3074 17.9129 17.3457 17.9233 17.3816 17.931C20.0651 18.6246 22.4781 20.0584 23.8977 19.8954C22.7797 20.8685 21.5589 21.7588 19.098 21.6294C19.1627 21.8675 19.3302 22.0228 19.584 22.1185Z"
                                        fill="#258F67"
                                    />
                                    <path
                                        d="M12.3627 16.6732C12.3627 16.6732 9.45119 17.3788 6.85934 17.5985C3.80271 16.3889 2.04202 14.4581 1.13462 12.057C1.29446 12.2405 1.47398 12.3335 1.67316 12.3361C0.711665 9.49296 0.782978 7.49241 1.50348 6.02173C1.50594 6.02173 1.79857 15.6032 12.3627 16.6732Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M11.7116 16.7864C11.7116 16.7864 10.0667 16.3102 8.77415 13.0731C8.25027 10.5985 8.39211 7.84804 9.04868 4.88941C9.09443 5.55556 9.1928 5.98751 9.56341 6.25813C9.76473 3.64299 10.4648 1.54046 11.7138 0C11.2174 6.38824 10.904 12.4824 11.7116 16.7864Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M22.3487 6.552C20.8856 12.8009 17.0985 15.79 12.0293 16.9711C13.0596 16.6693 14.1769 15.0226 15.1296 13.2119C15.132 13.2093 15.132 13.2067 15.1343 13.2015C17.2608 9.81172 21.7419 8.18576 22.3487 6.552Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M23.9996 19.4003C19.2292 19.9109 15.026 19.3955 12.0508 16.6816C12.0508 16.6816 14.9231 17.4656 17.4842 17.5807C20.1675 18.2208 22.5778 19.5513 23.9996 19.4003Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M16.4192 23.6094C14.6332 21.5095 13.2143 19.1771 12.0742 16.6633C13.1894 18.0582 14.3113 19.4709 15.3222 20.6281C15.295 20.6077 15.2678 20.5898 15.2406 20.5694C15.9931 21.7982 16.0249 22.9554 16.4192 23.6094Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.2037 19.1457C11.7042 20.4843 11.0767 21.5573 10.256 22.2368C10.3589 21.9864 10.3213 21.8102 10.2209 21.6722C9.57084 22.5433 8.59201 23.2076 7.40234 23.7364C9.34998 21.5445 10.9713 19.2351 12.2137 16.7903C12.3342 17.2476 12.299 18.1545 12.2037 19.1457Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.0016 16.896C11.9154 17.0026 10.0093 19.3149 8.54143 20.9535C7.23401 21.8691 5.84277 22.2176 4.37251 22.0746C4.62394 21.9783 4.79395 21.8197 4.85382 21.5856C2.39461 21.7156 1.17339 20.8209 0.0527344 19.8429C0.0934418 19.8455 0.136544 19.8507 0.179646 19.8533C4.51858 20.2227 8.54862 19.5204 12.0016 16.896Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.811 16.7992C12.811 17.2789 12.4464 17.6674 11.9963 17.6674C11.5462 17.6674 11.1816 17.2789 11.1816 16.7992C11.1816 16.3195 11.5462 15.9309 11.9963 15.9309C12.4464 15.9309 12.811 16.3195 12.811 16.7992Z"
                                        fill="#214842"
                                    />
                                </svg>
                            </span>
                            Recent Posts
                        </h4>
                        <ul class="list">
                            <li class="list-item">
                                <a class="d-flex flex-column flex-sm-row align-items-sm-center" href="post.html">
                                    <span class="media">
                                        <picture>
                                            <source
                                                data-srcset="front/img/placeholder.jpg"
                                                srcset="front/img/placeholder.jpg"
                                                type="image/webp"
                                            />
                                            <img
                                                class="preview"
                                                data-src="front/img/placeholder.jpg"
                                                src="front/img/placeholder.jpg"
                                                alt="post"
                                            />
                                        </picture>
                                    </span>
                                    <span class="wrapper">
                                        <span class="title">Best Weed Strains For Anxiety</span>
                                        <span class="metadata d-flex align-items-center"
                                            ><i class="icon-calendar_day icon"></i>September 30, 2021</span
                                        >
                                    </span>
                                </a>
                            </li>
                            <li class="list-item">
                                <a class="d-flex flex-column flex-sm-row align-items-sm-center" href="post.html">
                                    <span class="media">
                                        <picture>
                                            <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                            <img class="preview" data-src="front/img/placeholder.jpg" src="front/img/placeholder.jpg" alt="post" />
                                        </picture>
                                    </span>
                                    <span class="wrapper">
                                        <span class="title">7 Things You Need to Know About Edibles</span>
                                        <span class="metadata d-flex align-items-center"
                                            ><i class="icon-calendar_day icon"></i>September 30, 2021</span
                                        >
                                    </span>
                                </a>
                            </li>
                            <li class="list-item">
                                <a class="d-flex flex-column flex-sm-row align-items-sm-center" href="post.html">
                                    <span class="media">
                                        <picture>
                                            <source
                                                data-srcset="front/img/placeholder.jpg"
                                                srcset="front/img/placeholder.jpg"
                                                type="image/webp"
                                            />
                                            <img
                                                class="preview"
                                                data-src="front/img/placeholder.jpg"
                                                src="front/img/placeholder.jpg"
                                                alt="post"
                                            />
                                        </picture>
                                    </span>
                                    <span class="wrapper">
                                        <span class="title">Vaporizers vs. Vapes: What’s the Difference?</span>
                                        <span class="metadata d-flex align-items-center"
                                            ><i class="icon-calendar_day icon"></i>September 30, 2021</span
                                        >
                                    </span>
                                </a>
                            </li>
                            <li class="list-item">
                                <a class="d-flex flex-column flex-sm-row align-items-sm-center" href="post.html">
                                    <span class="media">
                                        <picture>
                                            <source
                                                data-srcset="front/img/placeholder.jpg"
                                                srcset="front/img/placeholder.jpg"
                                                type="image/webp"
                                            />
                                            <img
                                                class="preview"
                                                data-src="front/img/placeholder.jpg"
                                                src="front/img/placeholder.jpg"
                                                alt="post"
                                            />
                                        </picture>
                                    </span>
                                    <span class="wrapper">
                                        <span class="title">Factors in Choosing Cannabis Products</span>
                                        <span class="metadata d-flex align-items-center"
                                            ><i class="icon-calendar_day icon"></i>September 30, 2021</span
                                        >
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="widgets-item widgets-item--tags">
                        <h4 class="widgets-item_header d-flex align-items-center">
                            <span class="leaf">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.584 22.1185C18.1022 22.2634 16.697 21.9115 15.3804 20.9798C15.3517 20.9591 15.3229 20.9409 15.2942 20.9202C16.089 22.1625 16.1225 23.3349 16.539 24C15.4043 23.4643 14.4707 22.7914 13.8507 21.9089C13.7574 22.0486 13.7215 22.2272 13.8172 22.4808C13.032 21.7872 12.4312 20.6899 11.9524 19.3208C11.9476 19.3312 11.9452 19.3415 11.9405 19.3493C11.4641 20.7054 10.8656 21.7924 10.0828 22.4808C10.181 22.2272 10.1451 22.0486 10.0493 21.9089C9.42932 22.7914 8.49572 23.4643 7.36104 24C7.77757 23.3375 7.81109 22.1625 8.60584 20.9202C8.56514 20.9487 8.52445 20.9798 8.48615 21.0031C7.17911 21.9141 5.78829 22.2609 4.31848 22.1185C4.56983 22.0228 4.73979 21.8649 4.79964 21.632C2.34117 21.7614 1.12031 20.8711 0 19.898C0.0406952 19.9006 0.0837842 19.9057 0.126873 19.9083C1.57993 19.9808 3.97616 18.5651 6.62853 17.9052C6.61656 17.9 6.6022 17.8948 6.59262 17.8896C3.61709 16.6784 1.9031 14.7451 1.01977 12.3408C1.17537 12.5246 1.35012 12.6178 1.54402 12.6204C0.608034 9.7735 0.677455 7.77035 1.37885 6.29774C1.49375 8.05762 6.66204 9.6855 8.90028 13.3968C8.89071 13.3528 8.88113 13.314 8.87395 13.27C8.32576 10.8087 8.47418 8.07315 9.16121 5.13053C9.20908 5.79307 9.31202 6.22269 9.69982 6.49185C9.91048 3.89085 10.643 1.79971 11.95 0.267578C13.2571 1.79971 13.9896 3.89085 14.2002 6.49185C14.588 6.22269 14.691 5.79307 14.7388 5.13053C15.4378 8.12491 15.5791 10.9045 14.9974 13.3968C15.0309 13.3372 15.0668 13.2829 15.1027 13.2234C15.1051 13.2208 15.1051 13.2182 15.1075 13.213C17.2691 9.84079 21.8318 8.22067 22.4494 6.59796V6.59537C22.4901 6.49702 22.5116 6.39609 22.5188 6.29515C23.2202 7.76776 23.2896 9.77091 22.3536 12.6178C22.5475 12.6126 22.7247 12.5194 22.8779 12.3383C21.9898 14.7529 20.2662 16.6914 17.2691 17.9026C17.3074 17.9129 17.3457 17.9233 17.3816 17.931C20.0651 18.6246 22.4781 20.0584 23.8977 19.8954C22.7797 20.8685 21.5589 21.7588 19.098 21.6294C19.1627 21.8675 19.3302 22.0228 19.584 22.1185Z"
                                        fill="#258F67"
                                    />
                                    <path
                                        d="M12.3627 16.6732C12.3627 16.6732 9.45119 17.3788 6.85934 17.5985C3.80271 16.3889 2.04202 14.4581 1.13462 12.057C1.29446 12.2405 1.47398 12.3335 1.67316 12.3361C0.711665 9.49296 0.782978 7.49241 1.50348 6.02173C1.50594 6.02173 1.79857 15.6032 12.3627 16.6732Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M11.7116 16.7864C11.7116 16.7864 10.0667 16.3102 8.77415 13.0731C8.25027 10.5985 8.39211 7.84804 9.04868 4.88941C9.09443 5.55556 9.1928 5.98751 9.56341 6.25813C9.76473 3.64299 10.4648 1.54046 11.7138 0C11.2174 6.38824 10.904 12.4824 11.7116 16.7864Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M22.3487 6.552C20.8856 12.8009 17.0985 15.79 12.0293 16.9711C13.0596 16.6693 14.1769 15.0226 15.1296 13.2119C15.132 13.2093 15.132 13.2067 15.1343 13.2015C17.2608 9.81172 21.7419 8.18576 22.3487 6.552Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M23.9996 19.4003C19.2292 19.9109 15.026 19.3955 12.0508 16.6816C12.0508 16.6816 14.9231 17.4656 17.4842 17.5807C20.1675 18.2208 22.5778 19.5513 23.9996 19.4003Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M16.4192 23.6094C14.6332 21.5095 13.2143 19.1771 12.0742 16.6633C13.1894 18.0582 14.3113 19.4709 15.3222 20.6281C15.295 20.6077 15.2678 20.5898 15.2406 20.5694C15.9931 21.7982 16.0249 22.9554 16.4192 23.6094Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.2037 19.1457C11.7042 20.4843 11.0767 21.5573 10.256 22.2368C10.3589 21.9864 10.3213 21.8102 10.2209 21.6722C9.57084 22.5433 8.59201 23.2076 7.40234 23.7364C9.34998 21.5445 10.9713 19.2351 12.2137 16.7903C12.3342 17.2476 12.299 18.1545 12.2037 19.1457Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.0016 16.896C11.9154 17.0026 10.0093 19.3149 8.54143 20.9535C7.23401 21.8691 5.84277 22.2176 4.37251 22.0746C4.62394 21.9783 4.79395 21.8197 4.85382 21.5856C2.39461 21.7156 1.17339 20.8209 0.0527344 19.8429C0.0934418 19.8455 0.136544 19.8507 0.179646 19.8533C4.51858 20.2227 8.54862 19.5204 12.0016 16.896Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.811 16.7992C12.811 17.2789 12.4464 17.6674 11.9963 17.6674C11.5462 17.6674 11.1816 17.2789 11.1816 16.7992C11.1816 16.3195 11.5462 15.9309 11.9963 15.9309C12.4464 15.9309 12.811 16.3195 12.811 16.7992Z"
                                        fill="#214842"
                                    />
                                </svg>
                            </span>
                            Tags
                        </h4>
                        <ul class="list d-flex flex-wrap">
                            <li class="list-item">
                                <a class="link d-inline-flex align-items-center justify-content-center" href="#">Vaping</a>
                            </li>
                            <li class="list-item">
                                <a class="link d-inline-flex align-items-center justify-content-center" href="#">Cannabis</a>
                            </li>
                            <li class="list-item">
                                <a class="link d-inline-flex align-items-center justify-content-center" href="#">Flower</a>
                            </li>
                            <li class="list-item">
                                <a class="link d-inline-flex align-items-center justify-content-center" href="#">Health</a>
                            </li>
                            <li class="list-item">
                                <a class="link d-inline-flex align-items-center justify-content-center" href="#">Nature</a>
                            </li>
                            <li class="list-item">
                                <a class="link d-inline-flex align-items-center justify-content-center" href="#">Help</a>
                            </li>
                            <li class="list-item">
                                <a class="link d-inline-flex align-items-center justify-content-center" href="#">Facts</a>
                            </li>
                            <li class="list-item">
                                <a class="link d-inline-flex align-items-center justify-content-center" href="#">Medicine</a>
                            </li>
                        </ul>
                    </div>
                    <div class="widgets-item widgets-item--comments">
                        <h4 class="widgets-item_header d-flex align-items-center">
                            <span class="leaf">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.584 22.1185C18.1022 22.2634 16.697 21.9115 15.3804 20.9798C15.3517 20.9591 15.3229 20.9409 15.2942 20.9202C16.089 22.1625 16.1225 23.3349 16.539 24C15.4043 23.4643 14.4707 22.7914 13.8507 21.9089C13.7574 22.0486 13.7215 22.2272 13.8172 22.4808C13.032 21.7872 12.4312 20.6899 11.9524 19.3208C11.9476 19.3312 11.9452 19.3415 11.9405 19.3493C11.4641 20.7054 10.8656 21.7924 10.0828 22.4808C10.181 22.2272 10.1451 22.0486 10.0493 21.9089C9.42932 22.7914 8.49572 23.4643 7.36104 24C7.77757 23.3375 7.81109 22.1625 8.60584 20.9202C8.56514 20.9487 8.52445 20.9798 8.48615 21.0031C7.17911 21.9141 5.78829 22.2609 4.31848 22.1185C4.56983 22.0228 4.73979 21.8649 4.79964 21.632C2.34117 21.7614 1.12031 20.8711 0 19.898C0.0406952 19.9006 0.0837842 19.9057 0.126873 19.9083C1.57993 19.9808 3.97616 18.5651 6.62853 17.9052C6.61656 17.9 6.6022 17.8948 6.59262 17.8896C3.61709 16.6784 1.9031 14.7451 1.01977 12.3408C1.17537 12.5246 1.35012 12.6178 1.54402 12.6204C0.608034 9.7735 0.677455 7.77035 1.37885 6.29774C1.49375 8.05762 6.66204 9.6855 8.90028 13.3968C8.89071 13.3528 8.88113 13.314 8.87395 13.27C8.32576 10.8087 8.47418 8.07315 9.16121 5.13053C9.20908 5.79307 9.31202 6.22269 9.69982 6.49185C9.91048 3.89085 10.643 1.79971 11.95 0.267578C13.2571 1.79971 13.9896 3.89085 14.2002 6.49185C14.588 6.22269 14.691 5.79307 14.7388 5.13053C15.4378 8.12491 15.5791 10.9045 14.9974 13.3968C15.0309 13.3372 15.0668 13.2829 15.1027 13.2234C15.1051 13.2208 15.1051 13.2182 15.1075 13.213C17.2691 9.84079 21.8318 8.22067 22.4494 6.59796V6.59537C22.4901 6.49702 22.5116 6.39609 22.5188 6.29515C23.2202 7.76776 23.2896 9.77091 22.3536 12.6178C22.5475 12.6126 22.7247 12.5194 22.8779 12.3383C21.9898 14.7529 20.2662 16.6914 17.2691 17.9026C17.3074 17.9129 17.3457 17.9233 17.3816 17.931C20.0651 18.6246 22.4781 20.0584 23.8977 19.8954C22.7797 20.8685 21.5589 21.7588 19.098 21.6294C19.1627 21.8675 19.3302 22.0228 19.584 22.1185Z"
                                        fill="#258F67"
                                    />
                                    <path
                                        d="M12.3627 16.6732C12.3627 16.6732 9.45119 17.3788 6.85934 17.5985C3.80271 16.3889 2.04202 14.4581 1.13462 12.057C1.29446 12.2405 1.47398 12.3335 1.67316 12.3361C0.711665 9.49296 0.782978 7.49241 1.50348 6.02173C1.50594 6.02173 1.79857 15.6032 12.3627 16.6732Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M11.7116 16.7864C11.7116 16.7864 10.0667 16.3102 8.77415 13.0731C8.25027 10.5985 8.39211 7.84804 9.04868 4.88941C9.09443 5.55556 9.1928 5.98751 9.56341 6.25813C9.76473 3.64299 10.4648 1.54046 11.7138 0C11.2174 6.38824 10.904 12.4824 11.7116 16.7864Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M22.3487 6.552C20.8856 12.8009 17.0985 15.79 12.0293 16.9711C13.0596 16.6693 14.1769 15.0226 15.1296 13.2119C15.132 13.2093 15.132 13.2067 15.1343 13.2015C17.2608 9.81172 21.7419 8.18576 22.3487 6.552Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M23.9996 19.4003C19.2292 19.9109 15.026 19.3955 12.0508 16.6816C12.0508 16.6816 14.9231 17.4656 17.4842 17.5807C20.1675 18.2208 22.5778 19.5513 23.9996 19.4003Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M16.4192 23.6094C14.6332 21.5095 13.2143 19.1771 12.0742 16.6633C13.1894 18.0582 14.3113 19.4709 15.3222 20.6281C15.295 20.6077 15.2678 20.5898 15.2406 20.5694C15.9931 21.7982 16.0249 22.9554 16.4192 23.6094Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.2037 19.1457C11.7042 20.4843 11.0767 21.5573 10.256 22.2368C10.3589 21.9864 10.3213 21.8102 10.2209 21.6722C9.57084 22.5433 8.59201 23.2076 7.40234 23.7364C9.34998 21.5445 10.9713 19.2351 12.2137 16.7903C12.3342 17.2476 12.299 18.1545 12.2037 19.1457Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.0016 16.896C11.9154 17.0026 10.0093 19.3149 8.54143 20.9535C7.23401 21.8691 5.84277 22.2176 4.37251 22.0746C4.62394 21.9783 4.79395 21.8197 4.85382 21.5856C2.39461 21.7156 1.17339 20.8209 0.0527344 19.8429C0.0934418 19.8455 0.136544 19.8507 0.179646 19.8533C4.51858 20.2227 8.54862 19.5204 12.0016 16.896Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.811 16.7992C12.811 17.2789 12.4464 17.6674 11.9963 17.6674C11.5462 17.6674 11.1816 17.2789 11.1816 16.7992C11.1816 16.3195 11.5462 15.9309 11.9963 15.9309C12.4464 15.9309 12.811 16.3195 12.811 16.7992Z"
                                        fill="#214842"
                                    />
                                </svg>
                            </span>
                            Recent Comments
                        </h4>
                        <ul class="list">
                            <li class="list-item d-flex align-items-baseline">
                                <i class="icon-commenting icon"></i>
                                <span class="comment"> <span class="author">Admin</span> in tempor eros tortor, a ornare </span>
                            </li>
                            <li class="list-item d-flex">
                                <i class="icon-commenting icon"></i>
                                <span class="comment"> <span class="author">Admin</span> in tempor eros tortor, a ornare </span>
                            </li>
                            <li class="list-item d-flex">
                                <i class="icon-commenting icon"></i>
                                <span class="comment"> <span class="author">Admin</span> in tempor eros tortor, a ornare </span>
                            </li>
                        </ul>
                    </div>
                    <div class="widgets-item widgets-item--calendar">
                        <h4 class="widgets-item_header d-flex align-items-center">
                            <span class="leaf">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.584 22.1185C18.1022 22.2634 16.697 21.9115 15.3804 20.9798C15.3517 20.9591 15.3229 20.9409 15.2942 20.9202C16.089 22.1625 16.1225 23.3349 16.539 24C15.4043 23.4643 14.4707 22.7914 13.8507 21.9089C13.7574 22.0486 13.7215 22.2272 13.8172 22.4808C13.032 21.7872 12.4312 20.6899 11.9524 19.3208C11.9476 19.3312 11.9452 19.3415 11.9405 19.3493C11.4641 20.7054 10.8656 21.7924 10.0828 22.4808C10.181 22.2272 10.1451 22.0486 10.0493 21.9089C9.42932 22.7914 8.49572 23.4643 7.36104 24C7.77757 23.3375 7.81109 22.1625 8.60584 20.9202C8.56514 20.9487 8.52445 20.9798 8.48615 21.0031C7.17911 21.9141 5.78829 22.2609 4.31848 22.1185C4.56983 22.0228 4.73979 21.8649 4.79964 21.632C2.34117 21.7614 1.12031 20.8711 0 19.898C0.0406952 19.9006 0.0837842 19.9057 0.126873 19.9083C1.57993 19.9808 3.97616 18.5651 6.62853 17.9052C6.61656 17.9 6.6022 17.8948 6.59262 17.8896C3.61709 16.6784 1.9031 14.7451 1.01977 12.3408C1.17537 12.5246 1.35012 12.6178 1.54402 12.6204C0.608034 9.7735 0.677455 7.77035 1.37885 6.29774C1.49375 8.05762 6.66204 9.6855 8.90028 13.3968C8.89071 13.3528 8.88113 13.314 8.87395 13.27C8.32576 10.8087 8.47418 8.07315 9.16121 5.13053C9.20908 5.79307 9.31202 6.22269 9.69982 6.49185C9.91048 3.89085 10.643 1.79971 11.95 0.267578C13.2571 1.79971 13.9896 3.89085 14.2002 6.49185C14.588 6.22269 14.691 5.79307 14.7388 5.13053C15.4378 8.12491 15.5791 10.9045 14.9974 13.3968C15.0309 13.3372 15.0668 13.2829 15.1027 13.2234C15.1051 13.2208 15.1051 13.2182 15.1075 13.213C17.2691 9.84079 21.8318 8.22067 22.4494 6.59796V6.59537C22.4901 6.49702 22.5116 6.39609 22.5188 6.29515C23.2202 7.76776 23.2896 9.77091 22.3536 12.6178C22.5475 12.6126 22.7247 12.5194 22.8779 12.3383C21.9898 14.7529 20.2662 16.6914 17.2691 17.9026C17.3074 17.9129 17.3457 17.9233 17.3816 17.931C20.0651 18.6246 22.4781 20.0584 23.8977 19.8954C22.7797 20.8685 21.5589 21.7588 19.098 21.6294C19.1627 21.8675 19.3302 22.0228 19.584 22.1185Z"
                                        fill="#258F67"
                                    />
                                    <path
                                        d="M12.3627 16.6732C12.3627 16.6732 9.45119 17.3788 6.85934 17.5985C3.80271 16.3889 2.04202 14.4581 1.13462 12.057C1.29446 12.2405 1.47398 12.3335 1.67316 12.3361C0.711665 9.49296 0.782978 7.49241 1.50348 6.02173C1.50594 6.02173 1.79857 15.6032 12.3627 16.6732Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M11.7116 16.7864C11.7116 16.7864 10.0667 16.3102 8.77415 13.0731C8.25027 10.5985 8.39211 7.84804 9.04868 4.88941C9.09443 5.55556 9.1928 5.98751 9.56341 6.25813C9.76473 3.64299 10.4648 1.54046 11.7138 0C11.2174 6.38824 10.904 12.4824 11.7116 16.7864Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M22.3487 6.552C20.8856 12.8009 17.0985 15.79 12.0293 16.9711C13.0596 16.6693 14.1769 15.0226 15.1296 13.2119C15.132 13.2093 15.132 13.2067 15.1343 13.2015C17.2608 9.81172 21.7419 8.18576 22.3487 6.552Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M23.9996 19.4003C19.2292 19.9109 15.026 19.3955 12.0508 16.6816C12.0508 16.6816 14.9231 17.4656 17.4842 17.5807C20.1675 18.2208 22.5778 19.5513 23.9996 19.4003Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M16.4192 23.6094C14.6332 21.5095 13.2143 19.1771 12.0742 16.6633C13.1894 18.0582 14.3113 19.4709 15.3222 20.6281C15.295 20.6077 15.2678 20.5898 15.2406 20.5694C15.9931 21.7982 16.0249 22.9554 16.4192 23.6094Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.2037 19.1457C11.7042 20.4843 11.0767 21.5573 10.256 22.2368C10.3589 21.9864 10.3213 21.8102 10.2209 21.6722C9.57084 22.5433 8.59201 23.2076 7.40234 23.7364C9.34998 21.5445 10.9713 19.2351 12.2137 16.7903C12.3342 17.2476 12.299 18.1545 12.2037 19.1457Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.0016 16.896C11.9154 17.0026 10.0093 19.3149 8.54143 20.9535C7.23401 21.8691 5.84277 22.2176 4.37251 22.0746C4.62394 21.9783 4.79395 21.8197 4.85382 21.5856C2.39461 21.7156 1.17339 20.8209 0.0527344 19.8429C0.0934418 19.8455 0.136544 19.8507 0.179646 19.8533C4.51858 20.2227 8.54862 19.5204 12.0016 16.896Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.811 16.7992C12.811 17.2789 12.4464 17.6674 11.9963 17.6674C11.5462 17.6674 11.1816 17.2789 11.1816 16.7992C11.1816 16.3195 11.5462 15.9309 11.9963 15.9309C12.4464 15.9309 12.811 16.3195 12.811 16.7992Z"
                                        fill="#214842"
                                    />
                                </svg>
                            </span>
                            Calendar
                        </h4>
                        <table class="table">
                            <caption class="table_header">
                                October 2021
                            </caption>
                            <tbody class="table_body">
                                <tr class="table_body-week">
                                    <th class="table_body-week_day">S</th>
                                    <th class="table_body-week_day">M</th>
                                    <th class="table_body-week_day">T</th>
                                    <th class="table_body-week_day">W</th>
                                    <th class="table_body-week_day">T</th>
                                    <th class="table_body-week_day">F</th>
                                    <th class="table_body-week_day">S</th>
                                </tr>
                                <tr class="table_body-dates">
                                    <td class="table_body-dates_date"></td>
                                    <td class="table_body-dates_date"></td>
                                    <td class="table_body-dates_date"></td>
                                    <td class="table_body-dates_date">1</td>
                                    <td class="table_body-dates_date">2</td>
                                    <td class="table_body-dates_date">3</td>
                                    <td class="table_body-dates_date">4</td>
                                </tr>
                                <tr class="table_body-dates">
                                    <td class="table_body-dates_date">5</td>
                                    <td class="table_body-dates_date">6</td>
                                    <td class="table_body-dates_date">7</td>
                                    <td class="table_body-dates_date">8</td>
                                    <td class="table_body-dates_date">9</td>
                                    <td class="table_body-dates_date">10</td>
                                    <td class="table_body-dates_date">11</td>
                                </tr>
                                <tr class="table_body-dates">
                                    <td class="table_body-dates_date">12</td>
                                    <td class="table_body-dates_date">13</td>
                                    <td class="table_body-dates_date">14</td>
                                    <td class="table_body-dates_date">15</td>
                                    <td class="table_body-dates_date table_body-dates_date--current">16</td>
                                    <td class="table_body-dates_date">17</td>
                                    <td class="table_body-dates_date">18</td>
                                </tr>
                                <tr class="table_body-dates">
                                    <td class="table_body-dates_date">19</td>
                                    <td class="table_body-dates_date">20</td>
                                    <td class="table_body-dates_date">21</td>
                                    <td class="table_body-dates_date">22</td>
                                    <td class="table_body-dates_date">23</td>
                                    <td class="table_body-dates_date">24</td>
                                    <td class="table_body-dates_date">25</td>
                                </tr>
                                <tr class="table_body-dates">
                                    <td class="table_body-dates_date">26</td>
                                    <td class="table_body-dates_date">27</td>
                                    <td class="table_body-dates_date">28</td>
                                    <td class="table_body-dates_date">29</td>
                                    <td class="table_body-dates_date">30</td>
                                    <td class="table_body-dates_date">31</td>
                                    <td class="table_body-dates_date"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="navigation d-flex align-items-center justify-content-between">
                            <a class="navigation_control navigation_control--prev d-inline-flex align-items-center" href="#">
                                <i class="icon-caret_left icon"></i>
                                Previous
                            </a>
                            <a class="navigation_control navigation_control--next d-inline-flex align-items-center" href="#">
                                Next
                                <i class="icon-caret_right icon"></i>
                            </a>
                        </div>
                    </div>
                    <div class="widgets-item widgets-item--archives">
                        <h4 class="widgets-item_header d-flex align-items-center">
                            <span class="leaf">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.584 22.1185C18.1022 22.2634 16.697 21.9115 15.3804 20.9798C15.3517 20.9591 15.3229 20.9409 15.2942 20.9202C16.089 22.1625 16.1225 23.3349 16.539 24C15.4043 23.4643 14.4707 22.7914 13.8507 21.9089C13.7574 22.0486 13.7215 22.2272 13.8172 22.4808C13.032 21.7872 12.4312 20.6899 11.9524 19.3208C11.9476 19.3312 11.9452 19.3415 11.9405 19.3493C11.4641 20.7054 10.8656 21.7924 10.0828 22.4808C10.181 22.2272 10.1451 22.0486 10.0493 21.9089C9.42932 22.7914 8.49572 23.4643 7.36104 24C7.77757 23.3375 7.81109 22.1625 8.60584 20.9202C8.56514 20.9487 8.52445 20.9798 8.48615 21.0031C7.17911 21.9141 5.78829 22.2609 4.31848 22.1185C4.56983 22.0228 4.73979 21.8649 4.79964 21.632C2.34117 21.7614 1.12031 20.8711 0 19.898C0.0406952 19.9006 0.0837842 19.9057 0.126873 19.9083C1.57993 19.9808 3.97616 18.5651 6.62853 17.9052C6.61656 17.9 6.6022 17.8948 6.59262 17.8896C3.61709 16.6784 1.9031 14.7451 1.01977 12.3408C1.17537 12.5246 1.35012 12.6178 1.54402 12.6204C0.608034 9.7735 0.677455 7.77035 1.37885 6.29774C1.49375 8.05762 6.66204 9.6855 8.90028 13.3968C8.89071 13.3528 8.88113 13.314 8.87395 13.27C8.32576 10.8087 8.47418 8.07315 9.16121 5.13053C9.20908 5.79307 9.31202 6.22269 9.69982 6.49185C9.91048 3.89085 10.643 1.79971 11.95 0.267578C13.2571 1.79971 13.9896 3.89085 14.2002 6.49185C14.588 6.22269 14.691 5.79307 14.7388 5.13053C15.4378 8.12491 15.5791 10.9045 14.9974 13.3968C15.0309 13.3372 15.0668 13.2829 15.1027 13.2234C15.1051 13.2208 15.1051 13.2182 15.1075 13.213C17.2691 9.84079 21.8318 8.22067 22.4494 6.59796V6.59537C22.4901 6.49702 22.5116 6.39609 22.5188 6.29515C23.2202 7.76776 23.2896 9.77091 22.3536 12.6178C22.5475 12.6126 22.7247 12.5194 22.8779 12.3383C21.9898 14.7529 20.2662 16.6914 17.2691 17.9026C17.3074 17.9129 17.3457 17.9233 17.3816 17.931C20.0651 18.6246 22.4781 20.0584 23.8977 19.8954C22.7797 20.8685 21.5589 21.7588 19.098 21.6294C19.1627 21.8675 19.3302 22.0228 19.584 22.1185Z"
                                        fill="#258F67"
                                    />
                                    <path
                                        d="M12.3627 16.6732C12.3627 16.6732 9.45119 17.3788 6.85934 17.5985C3.80271 16.3889 2.04202 14.4581 1.13462 12.057C1.29446 12.2405 1.47398 12.3335 1.67316 12.3361C0.711665 9.49296 0.782978 7.49241 1.50348 6.02173C1.50594 6.02173 1.79857 15.6032 12.3627 16.6732Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M11.7116 16.7864C11.7116 16.7864 10.0667 16.3102 8.77415 13.0731C8.25027 10.5985 8.39211 7.84804 9.04868 4.88941C9.09443 5.55556 9.1928 5.98751 9.56341 6.25813C9.76473 3.64299 10.4648 1.54046 11.7138 0C11.2174 6.38824 10.904 12.4824 11.7116 16.7864Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M22.3487 6.552C20.8856 12.8009 17.0985 15.79 12.0293 16.9711C13.0596 16.6693 14.1769 15.0226 15.1296 13.2119C15.132 13.2093 15.132 13.2067 15.1343 13.2015C17.2608 9.81172 21.7419 8.18576 22.3487 6.552Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M23.9996 19.4003C19.2292 19.9109 15.026 19.3955 12.0508 16.6816C12.0508 16.6816 14.9231 17.4656 17.4842 17.5807C20.1675 18.2208 22.5778 19.5513 23.9996 19.4003Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M16.4192 23.6094C14.6332 21.5095 13.2143 19.1771 12.0742 16.6633C13.1894 18.0582 14.3113 19.4709 15.3222 20.6281C15.295 20.6077 15.2678 20.5898 15.2406 20.5694C15.9931 21.7982 16.0249 22.9554 16.4192 23.6094Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.2037 19.1457C11.7042 20.4843 11.0767 21.5573 10.256 22.2368C10.3589 21.9864 10.3213 21.8102 10.2209 21.6722C9.57084 22.5433 8.59201 23.2076 7.40234 23.7364C9.34998 21.5445 10.9713 19.2351 12.2137 16.7903C12.3342 17.2476 12.299 18.1545 12.2037 19.1457Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.0016 16.896C11.9154 17.0026 10.0093 19.3149 8.54143 20.9535C7.23401 21.8691 5.84277 22.2176 4.37251 22.0746C4.62394 21.9783 4.79395 21.8197 4.85382 21.5856C2.39461 21.7156 1.17339 20.8209 0.0527344 19.8429C0.0934418 19.8455 0.136544 19.8507 0.179646 19.8533C4.51858 20.2227 8.54862 19.5204 12.0016 16.896Z"
                                        fill="#214842"
                                    />
                                    <path
                                        d="M12.811 16.7992C12.811 17.2789 12.4464 17.6674 11.9963 17.6674C11.5462 17.6674 11.1816 17.2789 11.1816 16.7992C11.1816 16.3195 11.5462 15.9309 11.9963 15.9309C12.4464 15.9309 12.811 16.3195 12.811 16.7992Z"
                                        fill="#214842"
                                    />
                                </svg>
                            </span>
                            Archives
                        </h4>
                        <ul class="list">
                            <li class="list-item d-flex align-items-center justify-content-between">
                                <span class="month d-flex align-items-center">
                                    <i class="icon-calendar_month icon"></i>
                                    <span class="month_name">January</span>
                                </span>
                                <a class="link" href="#">(12)</a>
                            </li>
                            <li class="list-item d-flex align-items-center justify-content-between">
                                <span class="month d-flex align-items-center">
                                    <i class="icon-calendar_month icon"></i>
                                    <span class="month_name">February</span>
                                </span>
                                <a class="link" href="#">(14)</a>
                            </li>
                            <li class="list-item d-flex align-items-center justify-content-between">
                                <span class="month d-flex align-items-center">
                                    <i class="icon-calendar_month icon"></i>
                                    <span class="month_name">March</span>
                                </span>
                                <a class="link" href="#">(16)</a>
                            </li>
                            <li class="list-item d-flex align-items-center justify-content-between">
                                <span class="month d-flex align-items-center">
                                    <i class="icon-calendar_month icon"></i>
                                    <span class="month_name">April</span>
                                </span>
                                <a class="link" href="#">(23)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="widgets-item widgets-item--sale">
                        <div class="content">
                            <h4 class="content_header">
                                Everything is 20% off for this special day! Save now or miss out on this great deal!
                            </h4>
                            <p class="content_text">Excluding items already on sale</p>
                            <div class="content_timer timer d-flex justify-content-start">
                                <div class="timer_block d-flex flex-column justify-content-center">
                                    <span class="timer_block-number" id="hours">22</span>
                                </div>
                                <div class="timer_separator d-flex flex-column justify-content-center align-items-center">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>
                                <div class="timer_block d-flex flex-column justify-content-center">
                                    <span class="timer_block-number" id="minutes">00</span>
                                </div>
                                <div class="timer_separator d-flex flex-column justify-content-center align-items-center">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>
                                <div class="timer_block d-flex flex-column justify-content-center">
                                    <span class="timer_block-number" id="seconds">59</span>
                                </div>
                            </div>
                            <a href="#" class="btn">Shop Now</a>
                        </div>
                        <div class="media">
                            <picture>
                                <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                <img class="lazy leaf" data-src="front/img/placeholder.jpg" src="front/img/placeholder.jpg" alt="media" />
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Single post content end -->
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('front/css/post2.min.css')}}" />
@endpush

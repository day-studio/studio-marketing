<?php
/**
 * Template Name: Web-About
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 
?>
<main class="page-about" data-barba="container"  data-barba-namespace="about"  id="container">

<section class="about">
    <div class="container-fluid">
        <div class="row section__title">
            <div class="col-lg-12">
                <h1 class="mask-text">
                    <span class="serif italic">
                       Who we are
                    </span>
                </h1>
                <div class="horizontal-line" ></div>
            </div>
        </div>
        <div class="row fade-item">
            <div class="col-lg-12">
                <p>
                    <span class="serif">Day</span><span class="serif italic">studio</span>는 디지털 디자인 분야의 전문성을 바탕으로 기업 소개 홈페이지 구축을 진행합니다. 2017년 9월에 설립 이후, 벤틀리모터스의 한국 마케팅 사이트, 드론 데이터 스타트업 엔젤스윙, 사모펀드전문회사 케이스톤파트너스 등 기업과 제품 마케팅을 위한 웹사이트 제작을 진행해왔습니다. 2019년 진행한 더드로잉룸 웹사이트는 GDWEB AWARD에 선정된 바 있습니다.
                </p>
                <p>
                    스튜디오의 설립자, 박용덕은 카이스트에서 산업디자인을 공부하고 IT 기술 기업 및 모바일 스타트업에서 10여년간 UX디자인을 리드하였습니다. 2017년 모던 웹 기술에 바탕을 둔 디자인 표현기법을 통해 기업 웹사이트 제작 서비스를 제공하고자 <span class="serif">Day</span><span class="serif italic">studio</span>를 설립하였습니다.
                </p>
            </div>
        </div>
        <div class="row fact  fade-item">
            <div class="col-lg-12">
                <div class="horizontal-line"></div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="loop">
                    <h6>회사명</h6>
                    <p>데이스튜디오</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="loop">
                    <h6>대표자</h6>
                    <p>박용덕</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="loop">
                    <h6>설립일</h6>
                    <p>2017년 9월 7일</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="loop">
                    <h6>사업자등록번호</h6>
                    <p>551-33-00340</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="loop">
                    <h6>주소</h6>
                    <p>서울시 강남구 남부순환로 2621 12층</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="loop">
                    <h6>전화번호</h6>
                    <p>0505-357-3157</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="loop">
                    <h6>팩스</h6>
                    <p>0505-357-3156</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="loop">
                    <h6>이메일</h6>
                    <p>contact@daystudio.co.kr</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="client">
    <div class="container-fluid">
    <?php 
        $args = array (
            'post_type'              =>  'client' ,
            'posts_per_page'         => '-1',
            'orderby' => 'menu_order', 
            'order'   => 'ASC',
        );
        $query = new WP_Query( $args );?>
        <?php if ( $query->have_posts() ) : ?>
            <div class="row section__title">
                <div class="col-lg-12">
                    <h1>
                        <span class="serif italic">
                            Our Clients
                        </span>
                    </h1>
                    <div class="horizontal-line" ></div>
                </div>
            </div>
            <div class="row">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-4">
                    <div class="loop">
                        <div class="loop__image">
                            <img src="<?php the_field('client_logo')?>" alt="">
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
                no post
        <?php endif; ?>
    </div>
</section>
</main>
<?php get_footer(); ?>

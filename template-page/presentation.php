<?php
/**
Template Name: company introduction
Template Post Type: post, page, presentation
 */

get_header('paper-landscape'); 
?>
<style>
    @page {
        size: A4 landscape
    }
</style>
<main>
    <section  class="sheet padding-10mm">

    <h3>디지털 전략 실행을 위한 반응형 웹사이트 제작</h3>
    </section>

    <section   class="sheet padding-10mm">

    디지털 전략을 실행하는 기업을 위한 반응형 웹사이트 제작을 진행하는 스튜디오입니다.
    </section>


    <section  class="sheet padding-10mm" >

    웹사이트 기획 단계부터 제작, 운영까지
다수의 프로젝트 수행 경력을 바탕으로 진행합니다.
    </section>


    <section  class="sheet padding-10mm" >

   2017년 설립 이후 고객사의 신뢰로 성장해왔습니다.
    </section>
    <section  class="sheet padding-10mm" >

    설립자 박용덕은 카이스트에서 산업디자인을 공부하고, <br>
미디어테크 기업 및 모바일 스타트업 등에서 UX디자인을 리드해왔습니다.
    </section>

    <section  class="sheet padding-10mm" >

        <h1>Works</h1>
    </section>
    <?php $project_list = get_field('project_list');?>
    <?php if( $project_list ): ?>
        <?php foreach( $project_list as $project ): ?>
            <section class="sheet padding-10mm" >
                <a href="<?php echo get_permalink( $project->ID ); ?>">
                    <?php echo get_the_title( $project->ID ); ?>
                </a>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>
</main>


<?php get_footer('paper'); ?>

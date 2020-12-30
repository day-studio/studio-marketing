<div class="pt-header">
    <h2><?php the_field('fact_title', 'option'); ?></h2>
    <p><?php the_field('fact_desc', 'option'); ?></p>
</div>

<div class="pt-main">
    <ul class="keyvalue">
        <li><span>회사명</span><?php the_field('fact_name', 'option'); ?></li>
        <li><span>대표자</span><?php the_field('fact_ceo', 'option'); ?></li>
        <li><span>웹사이트</span><?php the_field('fact_website', 'option'); ?></li>
        <li><span>주소</span><?php the_field('fact_addr_short', 'option'); ?></li>
        <li><span>전화 </span><?php the_field('fact_tel', 'option'); ?></li>
        <li><span>이메일</span><?php the_field('fact_email', 'option'); ?></li>
        <li><span>설립일</span><?php the_field('fact_establishment_date', 'option'); ?></li>
        <li><span>사업자등록번호</span><?php the_field('fact_reg_biz_num', 'option'); ?></li>
    </ul>
</div>

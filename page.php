<?php get_header(); ?>
    <main>
        <section class="about section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <h2 class="mb-4">
							<?= the_title(); ?>
                        </h2>
                    </div>
                    <div class="col-12">
						<?= the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer();?>
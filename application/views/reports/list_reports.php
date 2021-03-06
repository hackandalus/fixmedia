<div id="container" class="clearfix columns">
	<div id="content">
		<h1 class="title"><?=$title?></h1>
		<p class="sub_title sep"><?=$subtitle?></p>
		<section class="reports_list">
			<? foreach ($reports as $report) : ?>
				<article class="report_info clearfix">
					<div class="screenshot">
						<? if (is_null($report->screenshot) || $report->screenshot=="ERROR") : ?>
							<img src="<?php echo base_url(); ?>static/screenshot-thumb.jpg" alt="Captura de <?=$report->title;?> "  title="karma <?= $report->karma ?> / coef <?= $report->karma_value ?> / valor <?= $report->karma*$report->karma_value?>"/>
						<? else : ?>
							<img src="<?=base_url('images/sources/thumb-home-' . $report->id . '.png'); ?>" width="150" alt="Captura de <?=$report->title;?> "  title="karma <?= $report->karma ?> / coef <?= $report->karma_value ?> / valor <?= $report->karma*$report->karma_value?>"/>
						<? endif; ?>
						<div class="clearfix fix_reports_counters">
							<div class="fixes"><span class="count"><?= $report->votes_count; ?></span> fixes</div>
							<div class="reports"><span class="count"><?= count($report->data); ?></span> reportes</div>
						</div>
					</div>
					<h2 class="title"><a href="<?= site_url($this->router->reverseRoute('reports-view', array('slug' => $report->slug))); ?>"><?=$report->title;?></a></h2>
					<div class="report_meta">
						<p class="authorship">Enviado por <a href="<?= site_url($this->router->reverseRoute('user-profile', array('username' => $report->user->username))); ?>"><?= $report->user->name; ?></a> el <?= $report->created_at->format('d/m/Y'); ?></p>
						<p class="source">Fuente: <a href="<?= site_url($this->router->reverseRoute('source-profile', array('sitename' => $report->site))); ?>"><?= $report->site; ?></a></p>
					</div>
				</article>
			<? endforeach; ?>
		</section>
		<div class="pagination clearfix"><?=$pagination_links;?></div>
	</div>
	<?php $this->load->view('includes/sidebar'); ?>
</div>

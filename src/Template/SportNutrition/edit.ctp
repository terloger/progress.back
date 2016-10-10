<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sportNutrition->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sportNutrition->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sport Nutrition'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sportNutrition form large-9 medium-8 columns content">
    <?= $this->Form->create($sportNutrition) ?>
    <fieldset>
        <legend><?= __('Edit Sport Nutrition') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('color');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

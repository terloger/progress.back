<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Nutrition Log'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sport Nutrition'), ['controller' => 'SportNutrition', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sport Nutrition'), ['controller' => 'SportNutrition', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nutritionLog form large-9 medium-8 columns content">
    <?= $this->Form->create($nutritionLog) ?>
    <fieldset>
        <legend><?= __('Add Nutrition Log') ?></legend>
        <?php
            echo $this->Form->input('sport_nutrition_id', ['options' => $sportNutrition]);
            echo $this->Form->input('day_id', ['options' => $days]);
            echo $this->Form->input('time', ['empty' => true]);
            echo $this->Form->input('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

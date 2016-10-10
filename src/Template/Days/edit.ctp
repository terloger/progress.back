<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $day->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $day->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Days'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loads'), ['controller' => 'Loads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Load'), ['controller' => 'Loads', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Values Log'), ['controller' => 'ValuesLog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Values Log'), ['controller' => 'ValuesLog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="days form large-9 medium-8 columns content">
    <?= $this->Form->create($day) ?>
    <fieldset>
        <legend><?= __('Edit Day') ?></legend>
        <?php
            echo $this->Form->input('date');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

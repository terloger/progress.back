<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Values Log'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="valuesLog form large-9 medium-8 columns content">
    <?= $this->Form->create($valuesLog) ?>
    <fieldset>
        <legend><?= __('Add Values Log') ?></legend>
        <?php
            echo $this->Form->input('unit_id', ['options' => $units]);
            echo $this->Form->input('day_id', ['options' => $days]);
            echo $this->Form->input('time', ['empty' => true]);
            echo $this->Form->input('value');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

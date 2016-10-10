<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Loads'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Type Load'), ['controller' => 'TypeLoad', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Load'), ['controller' => 'TypeLoad', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loads form large-9 medium-8 columns content">
    <?= $this->Form->create($load) ?>
    <fieldset>
        <legend><?= __('Add Load') ?></legend>
        <?php
    debug($days->toArray());
            echo $this->Form->input('type_load_id', ['options' => $typeLoad]);
            echo $this->Form->input('day_id', ['options' => $days]);
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

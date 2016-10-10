<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $unit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Values Log'), ['controller' => 'ValuesLog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Values Log'), ['controller' => 'ValuesLog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="units form large-9 medium-8 columns content">
    <?= $this->Form->create($unit) ?>
    <fieldset>
        <legend><?= __('Edit Unit') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('type');
            echo $this->Form->input('min');
            echo $this->Form->input('max');
            echo $this->Form->input('sign');
            echo $this->Form->input('is_permanent');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

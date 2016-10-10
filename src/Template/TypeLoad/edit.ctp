<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $typeLoad->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $typeLoad->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Type Load'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Loads'), ['controller' => 'Loads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Load'), ['controller' => 'Loads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typeLoad form large-9 medium-8 columns content">
    <?= $this->Form->create($typeLoad) ?>
    <fieldset>
        <legend><?= __('Edit Type Load') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('color');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

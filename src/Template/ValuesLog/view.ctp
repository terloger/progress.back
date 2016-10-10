<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Values Log'), ['action' => 'edit', $valuesLog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Values Log'), ['action' => 'delete', $valuesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valuesLog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Values Log'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Values Log'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="valuesLog view large-9 medium-8 columns content">
    <h3><?= h($valuesLog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= $valuesLog->has('unit') ? $this->Html->link($valuesLog->unit->name, ['controller' => 'Units', 'action' => 'view', $valuesLog->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day') ?></th>
            <td><?= $valuesLog->has('day') ? $this->Html->link($valuesLog->day->date, ['controller' => 'Days', 'action' => 'view', $valuesLog->day->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($valuesLog->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($valuesLog->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($valuesLog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($valuesLog->time) ?></td>
        </tr>
    </table>
</div>

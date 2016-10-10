<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Unit'), ['action' => 'edit', $unit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unit'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Values Log'), ['controller' => 'ValuesLog', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Values Log'), ['controller' => 'ValuesLog', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="units view large-9 medium-8 columns content">
    <h3><?= h($unit->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($unit->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sign') ?></th>
            <td><?= h($unit->sign) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($unit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Min') ?></th>
            <td><?= $this->Number->format($unit->min) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Max') ?></th>
            <td><?= $this->Number->format($unit->max) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Permanent') ?></th>
            <td><?= $this->Number->format($unit->is_permanent) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($unit->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Type') ?></h4>
        <?= $this->Text->autoParagraph(h($unit->type)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Values Log') ?></h4>
        <?php if (!empty($unit->values_log)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Unit Id') ?></th>
                <th scope="col"><?= __('Day Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Timestamp') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($unit->values_log as $valuesLog): ?>
            <tr>
                <td><?= h($valuesLog->id) ?></td>
                <td><?= h($valuesLog->unit_id) ?></td>
                <td><?= h($valuesLog->day_id) ?></td>
                <td><?= h($valuesLog->user_id) ?></td>
                <td><?= h($valuesLog->timestamp) ?></td>
                <td><?= h($valuesLog->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ValuesLog', 'action' => 'view', $valuesLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ValuesLog', 'action' => 'edit', $valuesLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ValuesLog', 'action' => 'delete', $valuesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valuesLog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

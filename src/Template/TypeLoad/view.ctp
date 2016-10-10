<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Type Load'), ['action' => 'edit', $typeLoad->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Type Load'), ['action' => 'delete', $typeLoad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeLoad->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Type Load'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type Load'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loads'), ['controller' => 'Loads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Load'), ['controller' => 'Loads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="typeLoad view large-9 medium-8 columns content">
    <h3><?= h($typeLoad->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($typeLoad->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($typeLoad->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($typeLoad->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Loads') ?></h4>
        <?php if (!empty($typeLoad->loads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type Load Id') ?></th>
                <th scope="col"><?= __('Day Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Timestamp') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($typeLoad->loads as $loads): ?>
            <tr>
                <td><?= h($loads->id) ?></td>
                <td><?= h($loads->type_load_id) ?></td>
                <td><?= h($loads->day_id) ?></td>
                <td><?= h($loads->user_id) ?></td>
                <td><?= h($loads->timestamp) ?></td>
                <td><?= h($loads->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Loads', 'action' => 'view', $loads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Loads', 'action' => 'edit', $loads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Loads', 'action' => 'delete', $loads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

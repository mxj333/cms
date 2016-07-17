<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Column'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="columns index large-9 medium-8 columns content">
    <h3><?= __('Columns') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($columns as $column): ?>
            <tr>
                <td><?= $this->Number->format($column->id) ?></td>
                <td><?= $column->has('parent_column') ? $this->Html->link($column->parent_column->name, ['controller' => 'Columns', 'action' => 'view', $column->parent_column->id]) : '' ?></td>
                <td><?= h($column->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $column->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $column->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $column->id], ['confirm' => __('Are you sure you want to delete # {0}?', $column->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

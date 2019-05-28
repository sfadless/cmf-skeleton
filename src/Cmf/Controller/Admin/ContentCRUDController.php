<?php

namespace Sfadless\Cmf\Controller\Admin;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sfadless\Cmf\Entity\Content;
use Sfadless\Cmf\Sortable\Item;
use Sonata\AdminBundle\Controller\CRUDController;

/**
 * ContentCRUDController
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class ContentCRUDController extends CRUDController
{
//    public function listAction()
//    {
//        $contents = $this->getDoctrine()->getRepository(Content::class)->findAll();
//
////        $items = [];
////        foreach ($contents as $content) {
////            $item = [
////                'id' => $content->getId(),
////                'title' => $content->getName()
////            ];
////
////            if ($content->getParent()) {
////                $item['parent'] = $content->getParent()->getId();
////            }
////
////            $items[] = $item;
////        }
//        $ar = $this->getTreeContent($contents);
////        dump($items);
////        $ar = [
////            ['id' => 1, 'title' => 'Главная'],
////            ['id' => 2, 'title' => 'Статьи', 'children' => [
////                ['id' => 3, 'title' => 'Статья 1']
////            ]],
////            ['id' => 3, 'title' => 'Контакты']
////        ];
//        return $this->renderWithExtraParams('admin/CRUD/content__tree_action.twig', ['contents' => json_encode($ar)]);
//    }

    private function getTreeContent(array $contents)
    {
        $collection = new ArrayCollection();dump($contents);

        foreach ($contents as $content) {
            $collection->add(
                new Item(
                    $content->getId(),
                    $content->getName(),
                    $content->getParent() ? $content->getParent()->getId() : null
                )
            );
        }
//        $collection = new ArrayCollection([
//            new Item(1, 'title1'),
//            new Item(2, 'title2'),
//            new Item(3, 'title3'),
//            new Item(4, 'title4'),
//            new Item(7, 'title7', 6),
//            new Item(8, 'title8', 1),
//            new Item(9, 'title9', 2),
//            new Item(6, 'title6', 5),
//            new Item(10, 'title10', 2),
//            new Item(11, 'title11', 9),
//            new Item(12, 'title12', 3),
//            new Item(13, 'title13', 3),
//            new Item(14, 'title14', 4),
//            new Item(15, 'title15', 10),
//            new Item(16, 'title16', 1),
//            new Item(17, 'title17', 2),
//            new Item(18, 'title18', 17),
//            new Item(5, 'title5', 1),
//        ]);

//        dump($collection);

        foreach ($collection as $item) {
            if (null === $item->getParentId()) {
                continue;
            }

            $parent = $this->findInCollectionById($item->getParentId(), $collection);
            $parent->getChildren()->add($item);
        }

        foreach ($collection as $item) {
            if ($item->getParentId()) {
                $collection->removeElement($item);
            }
        }

        return json_decode(json_encode($collection->toArray()), true);

//        die();
    }

    /**
     * @param $id
     * @param Collection $collection
     * @return Item
     */
    private function findInCollectionById($id, Collection $collection) {
        foreach ($collection as $item) {
            /** @var $item Item */
            if ($item->getId() === $id) {
                return $item;
            }
        }
    }
}
<?php

/**
 * Observer Pattern dùng để Định nghĩa mối phụ thuộc một - nhiều giữa các đối tượng để khi mà một đối tượng có sự thay đổi
 * trạng thái, tất các thành phần phụ thuộc của nó sẽ được thông báo và cập nhật một cách tự động.
 */

// abstract class AbstractSubject với vai trò Subject
abstract class AbstractSubject {
    abstract function attach(AbstractObserver $observer_in);
    abstract function detach(AbstractObserver $observer_in);
    abstract function notify();
}

// abstract class AbstractObserver định nghĩa một phương thức cập nhật cho các đối tượng sẽ được subject thông báo đến khi có sự thay đổi trạng thái.
abstract class AbstractObserver {
    abstract function update(AbstractSubject $subject_in);
}

// class PatternSubject lưu trữ trạng thái danh sách các PatternObserver.
// gửi thông báo đến các observer của nó khi có sự thay đổi trạng thái.
class PatternSubject extends AbstractSubject {
    private $favoritePatterns = NULL;
    private $observers = array();
    function __construct() {
    }
    function attach(AbstractObserver $observer_in) {
        //could also use array_push($this->observers, $observer_in);
        $this->observers[] = $observer_in;
    }
    function detach(AbstractObserver $observer_in) {
        //$key = array_search($observer_in, $this->observers);
        foreach($this->observers as $okey => $oval) {
            if ($oval == $observer_in) {
                unset($this->observers[$okey]);
            }
        }
    }
    function notify() {
        foreach($this->observers as $obs) {
            $obs->update($this);
        }
    }
    function updateFavorites($newFavorites) {
        $this->favorites = $newFavorites;
        $this->notify();
    }
    function getFavorites() {
        return $this->favorites;
    }
}

// duy trì một liên kết đến đối tượng PatternSubject.
// lưu trữ trạng thái của subject.
// thực thi việc cập nhật để giữ cho trạng thái đồng nhất với subject gửi thông báo đến.
class PatternObserver extends AbstractObserver {
    public function __construct() {
    }
    public function update(AbstractSubject $subject) {
        writeln(' new favorite patterns: '.$subject->getFavorites());
    }
}

// TESTING OBSERVER PATTERN
$patternGossiper = new PatternSubject();
$patternGossipFan = new PatternObserver();
$patternGossiper->attach($patternGossipFan);
$patternGossiper->updateFavorites('abstract factory, decorator, visitor');
$patternGossiper->updateFavorites('abstract factory, observer, decorator');
$patternGossiper->detach($patternGossipFan);
$patternGossiper->updateFavorites('abstract factory, observer, paisley');

?>

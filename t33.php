<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
	/**
	* 默认树的类
	*/
	class TreeNode
	{
		public $val;
		public $left=null;
		public $right=null;

		public function __construct($value)
		{
			$this->val=$value;
		}
	}

    class BinaryTree
    {
        public $root;
        public $data = null;

        /**
         * @param array $btdata
         */
        public function __construct($btdata = array())
        {
            $this->data = $btdata;
            $this->root = null;
            $this->getPreorderTraversalCreate($this->root);
        }

        public function getPreorderTraversalCreate(&$btnode)
        {
            $elem = array_shift($this->data);
            if ($elem == 0) {
                $btnode = null;
            } else if ($elem == null) {
                return;
            } else {
                $btnode = new TreeNode($elem);
                $this->getPreorderTraversalCreate($btnode->left);
                $this->getPreorderTraversalCreate($btnode->right);
            }
        }
    }
?>
<h1>二叉搜索树转为双向链表</h1>
<h2>将一颗二叉树转化为一个有序的循环双向链表</h2>
<?php
	function treeToDoublyList($root){
		$prev=null;
        $head=null;
        treeToDoublyList1($root,$prev,$head);
        return $head;
	}

    function treeToDoublyList1(&$p,&$prev,&$head){
        if(!$p){
            return;
        }
        treeToDoublyList1($p->left,$prev,$head);
        $p->left=$prev;
        if($prev){
            $prev->right=$p;
        }else{
            $head=$p;
        }
        $right=$p->right;
        $head->left=$p;
        $p->right=$head;
        $prev=$p;
        treeToDoublyList1($right,$prev,$head);
    }

    //以顺序存储结构存储的数组
    $arrTree=array(5,3,1,0,0,4,0,0,7,0,9,0,0);
    $tree=new BinaryTree($arrTree);
    var_dump($tree);
    var_dump(treeToDoublyList($tree->root));
?>
<h1>最小公共祖先</h1>
<h2>给定两个节点，求它们在一棵二叉树中的最小公共祖先</h2>
<?php
    function LCA($root,$p,$q){
        if($root==null||$p==null||$q==null){
            return null;
        }
        if($root->val>$p->val && $root->val>$q->val){
            return LCA($root->left,$p,$q);
        }elseif($root->val<$p->val && $root->val<$q->val){
            return LCA($root->right,$p,$q);
        }else{
            return $root;
        }

    }

    $p=new TreeNode(1);
    $q1=new TreeNode(9);
    $q2=new TreeNode(4);
    echo LCA($tree->root,$p,$q1)->val;
    echo '<br/>';
    echo LCA($tree->root,$p,$q2)->val;
?>
<h1>路径和12</h1>
<h2>给定一棵二叉树和一个值，判断是否存在从根到叶子节点的路径和等于给定的值</h2>
<?php
    function hasPathSum($root,$sum){
        if($root==null){
            return false;
        }
        if($root->left==null&&$root->right==null&&$root->val==$sum){
            return true;
        }else{
            return hasPathSum($root->left,$sum-$root->val)||hasPathSum($root->right,$sum-$root->val);
        }
    }

    $arrTree=array(5,3,1,0,0,4,6,0,0,2,0,0,7,0,9,0,0);
    $tree=new BinaryTree($arrTree);

    echo "18 ".hasPathSum($tree->root,18)."<br/>";
    echo "16 ".hasPathSum($tree->root,16)."<br/>";
?>
<h1>平衡二叉树</h1>
<h2>给出一棵二叉树。判断其是否为平衡二叉树</h2>
<?php
    function isBalanced($root){
        return (getHeight($root)!=-1);
    }

    function getHeight($root){
        if($root==null){
            return 0;
        }
        $leftHeight=getHeight($root->left);
        if($leftHeight==-1){
            return -1;
        }
        $rightHeight=getHeight($root->right);
        if($rightHeight==-1){
            return -1;
        }
        if(abs($leftHeight-$rightHeight)>1){
            return -1;
        }
        return 1+max($leftHeight,$rightHeight);
    }

    var_dump(isBalanced($tree->root));
?>
<h1>树的镜像</h1>
<h2>给出一棵二叉树，使用非递归的方法判断是否为其自身镜像</h2>
<?php
   
?>
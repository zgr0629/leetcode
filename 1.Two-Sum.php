<?php

/**
 * 1. Two Sum
 * Given an array of integers, return indices of the two numbers such that they add up to a specific target.
 * You may assume that each input would have exactly one solution, and you may not use the same element twice.
 * Example:
 * Given nums = [2, 7, 11, 15], target = 9,
 * Because nums[0] + nums[1] = 2 + 7 = 9,
 * return [0, 1].
 *
 * 1.两数之和
 * 给定一个整数数组nums，与整数target。
 * 数组内有且仅有一组数字nums[i]与nums[j]，使得nums[i] + nums[j] = target
 * 输出[i, j]
 */
/**
 * Solution：
 * Simply loop all the combinations of [i, j], which gives you a Time Complexity of O(n*n);
 * But we can have a better way to check if the complement exists in the $nums.
 * Use a hash table to mark number i exists in $nums.
 *
 * 双循环遍历所有[i, j]组合求和，效率比较底。时间复杂度O(n*n)，空间复杂度O(1)
 * 通过建立hash数组，其中hash[i]表示数字i是否存在于nums
 * 在遍历数组nums时，如果另一个数字（也就是target - nums[i]）在nums里存在（用hash数组判断），则找到结果
 * 时间复杂度O(n)，空间复杂度O(n)
 */
class Solution
{
	/**
	 * @param Integer[] $nums
	 * @param Integer $target
	 * @return Integer[]
	 */
	function twoSum($nums, $target)
	{
		$len = count($nums);
		$hash = [];
		for($i = 0; $i < $len; $i++) {
			// return the result if we can finds another number in $hash
			if(array_key_exists($target - $nums[$i], $hash)) {
				return [$i, $hash[$target - $nums[$i]]];
			}
			// Adding current number to hash table
			$hash[$nums[$i]] = $i;
		}
	}
}
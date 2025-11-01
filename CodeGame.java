public class CodeGame {
    public static void main(String[] args) {
        // input file
        int[][] input = {
                { 13, 5, 6, 2 },
                { 11, 3, 7, 5 },
                { 4, 3, 2, 3, 4 },
                { 10, 5, 2, 3, 7, 5 },
                { 1, 2, 3, 4, 5 },
                { 5, 1, 4, 6, 2 },
                { 10, 20, 30, 40 },
                {},
                { 12, 7, 19, 3, 25, 8, 14, 6, 21, 10, 17, 5, 2, 9, 11, 4, 18, 13, 20, 1 }
        };

        // target number from the file
        int[] target = { 8, 10, 6, 10, 8, 9, 50, 10, 29 };

        for (int i = 0; i < input.length; i++) {
            int[] array = input[i];
            int t = target[i];
            String result = findTwoChocolate(array, t);
            System.out.println(result);
        }
    }

    public static String findTwoChocolate(int[] array, int target) {
        // iterate through the array and add the number O(n^2)
        for (int i = 1; i < array.length; i++) {
            for (int j = 0; j < i; j++) {
                if (array[i] + array[j] == target) {
                    return j + ", " + i;
                }
            }
        }

        return null;
    }
}
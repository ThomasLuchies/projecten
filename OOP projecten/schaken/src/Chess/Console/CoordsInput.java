package Chess.Console;

public class CoordsInput
{
    public static boolean isValid(String input)
    {
        var inputArray = input.toLowerCase().toCharArray();
        if (input.length() == 2)
            return x(inputArray[0]) != 0 && y(inputArray[1]) != 0;
        if (input.length() == 4)
            return x(inputArray[0]) != 0 && y(inputArray[1]) != 0 && x(inputArray[2]) != 0 && y(inputArray[3]) != 0;
        return false;
    }

    public static int xLocation(String input)
    {
        var inputArray = input.toLowerCase().toCharArray();
        return x(inputArray[0]);
    }

    public static int yLocation(String input)
    {
        var inputArray = input.toLowerCase().toCharArray();
        return y(inputArray[1]);
    }

    public static int xDestination(String input)
    {
        var inputArray = input.toLowerCase().toCharArray();
        return x(inputArray[2]);
    }

    public static int yDestination(String input)
    {
        var inputArray = input.toLowerCase().toCharArray();
        return y(inputArray[3]);
    }

    private static int x(char c)
    {
        return switch (c)
        {
            case 'a' -> 1;
            case 'b' -> 2;
            case 'c' -> 3;
            case 'd' -> 4;
            case 'e' -> 5;
            case 'f' -> 6;
            case 'g' -> 7;
            case 'h' -> 8;
            default -> 0;
        };
    }

    private static int y(char c)
    {
        return switch (c)
        {
            case '1' -> 1;
            case '2' -> 2;
            case '3' -> 3;
            case '4' -> 4;
            case '5' -> 5;
            case '6' -> 6;
            case '7' -> 7;
            case '8' -> 8;
            default -> 0;
        };
    }
}
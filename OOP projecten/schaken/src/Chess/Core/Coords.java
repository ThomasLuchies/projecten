package Chess.Core;

/**
 * Represents the coordinates of a chessboard field.
 *
 * @author Sydney Minnaar
 * @author Thomas Luchies
 * @version 0.1
 */
public class Coords
{
    private int x;
    private int y;

    public Coords(int x, int y)
    {
        this.x = x;
        this.y = y;
    }

    public int x()
    {
        return x;
    }

    public int y()
    {
        return y;
    }

    public void coords(int x, int y)
    {
        this.x = x;
        this.y = y;
    }

    @Override
    public int hashCode()
    {
        final int prime = 31;
        var result = 1;
        result = prime * result + x;
        result = prime * result + y;
        return result;
    }

    @Override
    public boolean equals(Object o)
    {
        if (!(o instanceof Coords))
            return false;

        var coords = (Coords)o;

        return coords.x() == x && coords.y() == y;
    }
}
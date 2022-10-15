package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Coords;
import Chess.Core.Color;

public class ListAvailableBlackPawnMoves extends ListAvailablePawnMoves
{
    protected boolean correctPieceColor(Color color)
    {
        return color == Color.black;
    }

    protected Coords getForwardDestination(int rows)
    {
        return new Coords(location.x(), location.y() - rows);
    }

    protected Coords getRightTargetDestination()
    {
        return new Coords(location.x() - 1, location.y() - 1);
    }

    protected Coords getLeftTargetDestination()
    {
        return new Coords(location.x() + 1, location.y() - 1);
    }

    protected Coords getEnPassantTargetDestination(Coords destination)
    {
        return new Coords(destination.x(), destination.y() + 1);
    }

    protected boolean onEnPassantRow()
    {
        return location.y() == 4;
    }

    protected boolean noBlockingPiece(int rows)
    {
        return !board.pieceOnField(new Coords(location.x(), location.y() - rows));
    }

    protected boolean reachedEndOfBoard()
    {
        return location.y() - 1 <= 0;
    }
}
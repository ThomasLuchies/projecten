package Chess.Core.Usecases.IsChecked;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Field;
import Chess.Core.Usecases.LocateKing.LocateKing;

/**
 * Determines whether the king with the specified color is checked.
 *
 * @author Sydney Minnaar
 * @author Thomas Luchies
 * @version 0.1
 */
public abstract class IsChecked
{
    protected final LocateKing locateKing;

    public IsChecked()
    {
        this.locateKing = new LocateKing();
    }

    public abstract boolean execute(Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound;
}
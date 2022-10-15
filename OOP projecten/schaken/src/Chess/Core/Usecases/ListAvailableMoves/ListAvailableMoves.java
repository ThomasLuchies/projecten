package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;

import java.util.HashSet;

/**
 * Analyses available moves for the specified piece based on the specified location.
 * This interface is not responsible if the piece is protecting te king.
 *
 * @author Sydney Minnaar
 * @author Thomas Luchies
 * @version 0.1
 */
public abstract class ListAvailableMoves
{
    public abstract HashSet<Coords> list(Board board, Coords location) throws Board.FieldNotFound, Field.NoPieceAvailable;

    /**
     * Determines if the field on the specified location contains an opposite piece.
     *
     * @param board The board.
     * @param color The color of the piece that moves.
     * @param coords The destination coords.
     * @return True if opposite piece is on field.
     * @throws Field.NoPieceAvailable When no piece available.
     * @throws Board.FieldNotFound When no field is found.
     */
    public boolean isOppositePiece(Board board, Color color, Coords coords) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        if (!board.pieceOnField(coords))
            return false;
        var destinationPiece = board.getPiece(coords);
        return color != destinationPiece.getColor();
    }
}